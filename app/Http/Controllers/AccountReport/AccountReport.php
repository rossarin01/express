<?php

namespace App\Http\Controllers\AccountReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Draft;
use Carbon\Carbon;
use App\Models\MasterFileShipper;
use App\Models\MasterFileAgent;
use App\Models\MasterFileSale;
use App\Models\MasterFileDestinationPort;
use App\Models\MasterFileTranshipmentPort;
use App\Models\MasterFileLoadingPort;
use App\Models\MasterFileContainerType;
use App\Models\MasterFileFeeder;
use App\Models\MasterFileVessel;
use App\Models\MasterFileDepot;
use App\Models\MasterFileGateInDepot;
use App\Models\MasterFileLoadingLocation;
use App\Models\Receipt;
use App\Models\Invoice;
use App\Models\Job;
use DateTime;


class AccountReport extends Controller
{

    public function jobsWithoutInvoice($start = null, $end = null, $shipper = null, $agent = null, $sale = null)
    {
        // Default to current month's first and last day if no dates are provided
        if (!$start || !$end) {
            $start = Carbon::now()->startOfMonth()->toDateString();
            $end = Carbon::now()->endOfMonth()->toDateString();
        }

        $shipper_where = null;
        if(!is_null($shipper)){
            $shipper_where = $shipper;
        }

        $agent_where = null;
        if(!is_null($agent)){
            $agent_where = $agent;
        }

        $sale_where = null;
        if(!is_null($sale)){
            $sale_where = $sale;
        }

        $shippers = MasterFileShipper::all();
        $agent = MasterFileAgent::all();
        $sale = MasterFileSale::all();

        // Fetch jobs without associated invoices within the specified date range
        $jobsWithoutInvoice = Job::whereDoesntHave('invoice')
            ->whereDate('job_date', '>=', $start)
            ->whereDate('job_date', '<=', $end);
            if(!is_null($shipper_where)){
                $jobsWithoutInvoice->whereHas('draft', function($query) use($shipper_where){
                    $query->where('shipper_id', $shipper_where);
                });
            }

            if(!is_null($agent_where)){
                $jobsWithoutInvoice->whereHas('draft', function($query) use($agent_where){
                    $query->where('agent_id', $agent_where);
                });
            }

            if(!is_null($sale_where)){
                $jobsWithoutInvoice->whereHas('draft', function($query) use($sale_where){
                    $query->where('sale_id', $sale_where);
                });
            }

            $jobsWithoutInvoice = $jobsWithoutInvoice->get();

        $title_layouts = 'Jobs Without Invoice';

        $data = [
            'title_layouts' => $title_layouts,
            'jobs' => $jobsWithoutInvoice,
            'start' => $start,
            'end' => $end,
            'shippers' => $shippers,
            'agent' => $agent,
            'sale' => $sale,
        ];

        return view('front-end.pages.AccountReport.jobWithoutInvoice', $data);
    }


    public function invoiceWithoutReceipt($start = null, $end = null, $shipper = null, $agent = null, $sale = null)
    {
        // Default to current month's first and last day if no dates are provided
        if (!$start || !$end) {
            $start = Carbon::now()->startOfMonth()->toDateString();
            $end = Carbon::now()->endOfMonth()->toDateString();
        }

        $shipper_where = null;
        if(!is_null($shipper)){
            $shipper_where = $shipper;
        }

        $agent_where = null;
        if(!is_null($agent)){
            $agent_where = $agent;
        }

        $sale_where = null;
        if(!is_null($sale)){
            $sale_where = $sale;
        }

        $shippers = MasterFileShipper::all();
        $agent = MasterFileAgent::all();
        $sale = MasterFileSale::all();

        // Define the title for the layout
        $title_layouts = 'Invoices Without Receipt';

        // Fetch invoices without associated receipts within the specified date range
        $invoicesWithoutReceipt = Invoice::whereDoesntHave('receipt')
            ->whereBetween('invoice_date', [$start, $end]);


            if(!is_null($shipper_where)){
                $invoicesWithoutReceipt->whereHas('draft', function($query) use($shipper_where){
                    $query->where('shipper_id', $shipper_where);
                });
            }

            if(!is_null($agent_where)){
                $invoicesWithoutReceipt->whereHas('draft', function($query) use($agent_where){
                    $query->where('agent_id', $agent_where);
                });
            }

            if(!is_null($sale_where)){
                $invoicesWithoutReceipt->whereHas('draft', function($query) use($sale_where){
                    $query->where('sale_id', $sale_where);
                });
            }
            $invoicesWithoutReceipt = $invoicesWithoutReceipt->get();

        // Prepare the data array
        $data = [
            'title_layouts' => $title_layouts,
            'invoices' => $invoicesWithoutReceipt,
            'start' => $start,
            'end' => $end,
            'shippers' => $shippers,
            'agent' => $agent,
            'sale' => $sale,
        ];

        // Return the view with the prepared data
        return view('front-end.pages.AccountReport.invoiceWithoutReceipt', $data);
    }


    public function invoiceNoReceipt($start = null, $end = null, $shipper = null, $agent = null, $sale = null)
    {
        // Default to current month's first and last day if no dates are provided
        if (!$start || !$end) {
            $start = Carbon::now()->startOfMonth()->toDateString();
            $end = Carbon::now()->endOfMonth()->toDateString();
        }

        $shipper_where = null;
        if(!is_null($shipper)){
            $shipper_where = $shipper;
        }

        $agent_where = null;
        if(!is_null($agent)){
            $agent_where = $agent;
        }

        $sale_where = null;
        if(!is_null($sale)){
            $sale_where = $sale;
        }

        $shippers = MasterFileShipper::all();
        $agent = MasterFileAgent::all();
        $sale = MasterFileSale::all();

        // Define the title for the layout
        $title_layouts = 'Invoice เก็บเงินแล้วแต่ไม่ออกใบเสร็จ';

        // Fetch invoices with the specified status within the specified date range
        $invoices = Invoice::where('status', 'เก็บเงินแล้วแต่ไม่ได้ออกใบเสร็จ')
            ->whereBetween('invoice_date', [$start, $end]);
            if(!is_null($shipper_where)){
                $invoices->whereHas('draft', function($query) use($shipper_where){
                    $query->where('shipper_id', $shipper_where);
                });
            }

            if(!is_null($agent_where)){
                $invoices->whereHas('draft', function($query) use($agent_where){
                    $query->where('agent_id', $agent_where);
                });
            }

            if(!is_null($sale_where)){
                $invoices->whereHas('draft', function($query) use($sale_where){
                    $query->where('sale_id', $sale_where);
                });
            }
            $invoices = $invoices->get();

        // Prepare the data array
        $data = [
            'title_layouts' => $title_layouts,
            'invoices' => $invoices,
            'start' => $start,
            'end' => $end,
            'shippers' => $shippers,
            'agent' => $agent,
            'sale' => $sale,
        ];

        // Return the view with the prepared data
        return view('front-end.pages.AccountReport.invoiceNoReceipt', $data);
    }


    public function cancelledJobs($start = null, $end = null, $shipper = null, $agent = null, $sale = null)
    {
        // Default to current month's first and last day if no dates are provided
        if (!$start || !$end) {
            $start = Carbon::now()->startOfMonth()->toDateString();
            $end = Carbon::now()->endOfMonth()->toDateString();
        }

        $shipper_where = null;
        if(!is_null($shipper)){
            $shipper_where = $shipper;
        }

        $agent_where = null;
        if(!is_null($agent)){
            $agent_where = $agent;
        }

        $sale_where = null;
        if(!is_null($sale)){
            $sale_where = $sale;
        }

        $shippers = MasterFileShipper::all();
        $agent = MasterFileAgent::all();
        $sale = MasterFileSale::all();

        // Define the title for the layout
        $title_layouts = 'Cancelled Jobs';

        // Fetch jobs where the associated draft's status is 'cancel' within the specified date range
        $cancelledJobs = Job::whereHas('draft', function ($query) {
            $query->where('status', 'Cancel');
        })->whereBetween('job_date', [$start, $end]);

        if(!is_null($shipper_where)){
            $cancelledJobs->whereHas('draft', function($query) use($shipper_where){
                $query->where('shipper_id', $shipper_where);
            });
        }

        if(!is_null($agent_where)){
            $cancelledJobs->whereHas('draft', function($query) use($agent_where){
                $query->where('agent_id', $agent_where);
            });
        }

        if(!is_null($sale_where)){
            $cancelledJobs->whereHas('draft', function($query) use($sale_where){
                $query->where('sale_id', $sale_where);
            });
        }
        $cancelledJobs = $cancelledJobs->get();

        // Prepare the data array
        $data = [
            'title_layouts' => $title_layouts,
            'jobs' => $cancelledJobs,
            'start' => $start,
            'end' => $end,
            'shippers' => $shippers,
            'agent' => $agent,
            'sale' => $sale,
        ];

        // Return the view with the prepared data
        return view('front-end.pages.AccountReport.cancelledJobs', $data);
    }


    public function summaryReceiptsWithVAT($start = null, $end = null, $shipper = null, $agent = null, $sale = null)
    {
        // Default to current month's first and last day if no dates are provided
        if (!$start || !$end) {
            $start = Carbon::now()->startOfMonth()->toDateString();
            $end = Carbon::now()->endOfMonth()->toDateString();
        }

        $shipper_where = null;
        if(!is_null($shipper)){
            $shipper_where = $shipper;
        }

        $agent_where = null;
        if(!is_null($agent)){
            $agent_where = $agent;
        }

        $sale_where = null;
        if(!is_null($sale)){
            $sale_where = $sale;
        }

        $shippers = MasterFileShipper::all();
        $agent = MasterFileAgent::all();
        $sale = MasterFileSale::all();

        // Define the title for the layout
        $title_layouts = 'Summary Report of Receipts With VAT';

        // Fetch receipts where is_vat = 1 within the specified date range
        $receiptsWithVAT = Receipt::where('is_vat', 1)
            ->whereBetween('receipt_date', [$start, $end]);
            if(!is_null($shipper_where)){
                $receiptsWithVAT->whereHas('draft', function($query) use($shipper_where){
                    $query->where('shipper_id', $shipper_where);
                });
            }

            if(!is_null($agent_where)){
                $receiptsWithVAT->whereHas('draft', function($query) use($agent_where){
                    $query->where('agent_id', $agent_where);
                });
            }

            if(!is_null($sale_where)){
                $receiptsWithVAT->whereHas('draft', function($query) use($sale_where){
                    $query->where('sale_id', $sale_where);
                });
            }
            $receiptsWithVAT = $receiptsWithVAT->get();

        // Prepare the data array
        $data = [
            'title_layouts' => $title_layouts,
            'receipts' => $receiptsWithVAT,
            'start' => $start,
            'end' => $end,
            'shippers' => $shippers,
            'agent' => $agent,
            'sale' => $sale,
        ];

        // Return the view with the prepared data
        return view('front-end.pages.AccountReport.summaryReceiptsWithVAT', $data);
    }



    public function summaryReceiptsWithoutVAT($start = null, $end = null, $shipper = null, $agent = null, $sale = null)
    {
        // Default to current month's first and last day if no dates are provided
        if (!$start || !$end) {
            $start = Carbon::now()->startOfMonth()->toDateString();
            $end = Carbon::now()->endOfMonth()->toDateString();
        }

        $shipper_where = null;
        if(!is_null($shipper)){
            $shipper_where = $shipper;
        }

        $agent_where = null;
        if(!is_null($agent)){
            $agent_where = $agent;
        }

        $sale_where = null;
        if(!is_null($sale)){
            $sale_where = $sale;
        }

        $shippers = MasterFileShipper::all();
        $agent = MasterFileAgent::all();
        $sale = MasterFileSale::all();

        // Define the title for the layout
        $title_layouts = 'Summary Report of Receipts Without VAT';

        // Fetch receipts where is_vat = 0 within the specified date range
        $receiptsWithOutVAT = Receipt::where('is_vat', 0)
            ->whereBetween('receipt_date', [$start, $end]);
            if(!is_null($shipper_where)){
                $receiptsWithOutVAT->whereHas('draft', function($query) use($shipper_where){
                    $query->where('shipper_id', $shipper_where);
                });
            }

            if(!is_null($agent_where)){
                $receiptsWithOutVAT->whereHas('draft', function($query) use($agent_where){
                    $query->where('agent_id', $agent_where);
                });
            }

            if(!is_null($sale_where)){
                $receiptsWithOutVAT->whereHas('draft', function($query) use($sale_where){
                    $query->where('sale_id', $sale_where);
                });
            }
            $receiptsWithOutVAT = $receiptsWithOutVAT->get();

        // Prepare the data array
        $data = [
            'title_layouts' => $title_layouts,
            'receipts' => $receiptsWithOutVAT,
            'start' => $start,
            'end' => $end,
            'shippers' => $shippers,
            'agent' => $agent,
            'sale' => $sale,
        ];

        // Return the view with the prepared data
        return view('front-end.pages.AccountReport.summaryReceiptsWithoutVAT', $data);
    }


    public function receiptIssuedNotPaid($start = null, $end = null, $shipper = null, $agent = null, $sale = null)
    {
        // Default to current month's first and last day if no dates are provided
        if (!$start || !$end) {
            $start = Carbon::now()->startOfMonth()->toDateString();
            $end = Carbon::now()->endOfMonth()->toDateString();
        }

        $shipper_where = null;
        if(!is_null($shipper)){
            $shipper_where = $shipper;
        }

        $agent_where = null;
        if(!is_null($agent)){
            $agent_where = $agent;
        }

        $sale_where = null;
        if(!is_null($sale)){
            $sale_where = $sale;
        }

        $shippers = MasterFileShipper::all();
        $agent = MasterFileAgent::all();
        $sale = MasterFileSale::all();

        // Define the title for the layout
        $title_layouts = 'Receipts Issued but Not Paid';

        // Fetch receipts where payment_method is null within the specified date range
        $draftReceipts = Receipt::whereNull('payment_method')
            ->whereBetween('receipt_date', [$start, $end]);
            if(!is_null($shipper_where)){
                $draftReceipts->whereHas('draft', function($query) use($shipper_where){
                    $query->where('shipper_id', $shipper_where);
                });
            }

            if(!is_null($agent_where)){
                $draftReceipts->whereHas('draft', function($query) use($agent_where){
                    $query->where('agent_id', $agent_where);
                });
            }

            if(!is_null($sale_where)){
                $draftReceipts->whereHas('draft', function($query) use($sale_where){
                    $query->where('sale_id', $sale_where);
                });
            }
            $draftReceipts = $draftReceipts->get();

        // Prepare the data array
        $data = [
            'title_layouts' => $title_layouts,
            'receipts' => $draftReceipts,
            'start' => $start,
            'end' => $end,
            'shippers' => $shippers,
            'agent' => $agent,
            'sale' => $sale,
        ];

        // Return the view with the prepared data
        return view('front-end.pages.AccountReport.receiptIssuedNotPaid', $data);
    }





    public function summaryAllCosts($start = null, $end = null, $shipper = null, $agent = null, $sale = null)
    {
        // Default to current month's first and last day if no dates are provided
        if (!$start || !$end) {
            $start = Carbon::now()->startOfMonth()->toDateString();
            $end = Carbon::now()->endOfMonth()->toDateString();
        }

        $shipper_where = null;
        if(!is_null($shipper)){
            $shipper_where = $shipper;
        }

        $agent_where = null;
        if(!is_null($agent)){
            $agent_where = $agent;
        }

        $sale_where = null;
        if(!is_null($sale)){
            $sale_where = $sale;
        }

        $shippers = MasterFileShipper::all();
        $agent = MasterFileAgent::all();
        $sale = MasterFileSale::all();

        // Define the title for the layout
        $title_layouts = 'Summary Report of All Costs';


        // Fetch jobs without associated invoices within the specified date range
        $jobs = Job::whereDate('job_date', '>=', $start)
            ->whereDate('job_date', '<=', $end);
            if(!is_null($shipper_where)){
                $jobs->whereHas('draft', function($query) use($shipper_where){
                    $query->where('shipper_id', $shipper_where);
                });
            }

            if(!is_null($agent_where)){
                $jobs->whereHas('draft', function($query) use($agent_where){
                    $query->where('agent_id', $agent_where);
                });
            }

            if(!is_null($sale_where)){
                $jobs->whereHas('draft', function($query) use($sale_where){
                    $query->where('sale_id', $sale_where);
                });
            }

            $jobs = $jobs->get();

        $title_layouts = 'Jobs Without Invoice';

        $data = [
            'title_layouts' => $title_layouts,
            'jobs' => $jobs,
            'start' => $start,
            'end' => $end,
            'shippers' => $shippers,
            'agent' => $agent,
            'sale' => $sale,
        ];

        // Return the view with the prepared data
        return view('front-end.pages.AccountReport.summaryAllCosts', $data);
    }
}
