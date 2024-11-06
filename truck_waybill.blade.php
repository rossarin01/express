@extends('front-end.layouts.main')
@section('title', 'Truck Waybill')
@section('content')
    <html lang="en">

    <head>
        <!-- Other meta tags and stylesheets -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <div>
        <div class="text-right mb-5">
            @livewire('components.assets.button', ['color' => 'secondary', 'title' => 'กลับสู่หน้ารายการ Draft', 'icon' => 'corner-up-left', 'route' => 'drafts.index', 'action' => ''])

        </div>



        <form id="accident-report-form" method="POST" action="{{ route('drafts.truckWaybill.post') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-6 mt-5">


                {{-- section 1 --}}
                <div class="intro-y col-span-12 lg:col-span-12">

                    <style>
                        .custom-dropdown {
                            position: absolute;
                            background-color: white;
                            border: 1px solid #ccc;
                            max-height: 200px;
                            overflow-y: auto;
                            z-index: 1000;
                            /* Increase the z-index value */
                        }

                        .dropdown-item {
                            padding: 8px 16px;
                            cursor: pointer;
                        }

                        .dropdown-item:hover {
                            background-color: #f1f1f1;
                        }
                    </style>


                    <div class="intro-y box p-5">
                        <header class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                            <b>1. Input Invoice No.</b>
                        </header>

                        <div id="invoice_no_input_container" data-route="{{ route('drafts.truckWaybill') }}"
                            style="margin-top: 1rem">
                            <label for="invoice_no_input" class="form-label">Invoice No.</label>
                            <input type="text" id="invoice_no_input" name="invoice_no" class="form-control"
                                placeholder="Type to search invoice" autocomplete="off"
                                value="{{ $truckWaybill->invoice_no ?? '' }}">
                            <div id="invoice_no_dropdown" class="custom-dropdown" style="display: none;"></div>
                        </div>



                        <script>
                            jQuery(document).ready(function() {
                                var allTruckWaybills = {!! json_encode($truckWaybills) !!};

                                jQuery('#invoice_no_input').on('input', function() {
                                    var input = jQuery(this).val().toLowerCase();
                                    var dropdown = jQuery('#invoice_no_dropdown');
                                    dropdown.empty();

                                    // Filter truck waybill options based on input
                                    var filteredTruckWaybills = allTruckWaybills.filter(function(truckWaybill) {
                                        return truckWaybill.invoice_no.toString().toLowerCase().includes(input);
                                    });

                                    // Construct HTML for dropdown options
                                    var dropdownHTML = '';
                                    filteredTruckWaybills.forEach(function(truckWaybill) {
                                        dropdownHTML += '<div class="dropdown-item">' + truckWaybill.invoice_no +
                                            '</div>';
                                    });

                                    // Set dropdown content
                                    dropdown.html(dropdownHTML);

                                    // Show dropdown if there are filtered options, otherwise hide it
                                    if (filteredTruckWaybills.length > 0 || input !== '') {
                                        dropdown.show();
                                    } else {
                                        dropdown.hide();
                                    }
                                });

                                // Handle click on dropdown item
                                jQuery(document).on('click', '.dropdown-item', function() {
                                    var selectedInvoiceNo = jQuery(this).text();
                                    console.log('Selected Invoice No:', selectedInvoiceNo);

                                    // Find the truck waybill that matches the selected invoice number
                                    var matchTruckWaybill = allTruckWaybills.find(function(truckWaybill) {
                                        return truckWaybill.invoice_no.toString() === selectedInvoiceNo;
                                    });

                                    console.log('Matched Truck Waybill:', matchTruckWaybill);

                                    // Construct the route URL
                                    var routeUrl =
                                        '{{ route('drafts.truckWaybill', '') }}'; // Assuming "drafts.truckWaybill" is the route name

                                    // Update the URL with the selected invoice number
                                    window.location.href = routeUrl + '/' + selectedInvoiceNo;
                                });

                                // Helper function to format date to dd/mm/yyyy
                                function formatDate(dateStr) {
                                    let dateParts = dateStr.split('-');
                                    return `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;
                                }

                                // Pre-fill input with invoice number from URL
                                var currentUrl = window.location.href;
                                var url = new URL(currentUrl);

                                // Check for query parameter 'id'
                                var invoiceNo = url.searchParams.get('id');
                                var isClone = !!invoiceNo; // If 'id' query parameter exists, it's a clone action
                                console.log('Query Parameter Invoice No:', invoiceNo);

                                if (!invoiceNo) {
                                    // If no query parameter 'id', check for last number in the URL path
                                    var invoiceNoMatch = currentUrl.match(/\/([^/]+)$/);
                                    if (invoiceNoMatch) {
                                        invoiceNo = invoiceNoMatch[1];
                                        isClone = false; // Path parameter means it's an edit action
                                    }
                                }

                                console.log('Final Invoice No:', invoiceNo);
                                console.log('Is Clone:', isClone);

                                if (invoiceNo) {
                                    // Pre-fill other fields in the table and hidden inputs based on the matched truck waybill
                                    var matchTruckWaybill = allTruckWaybills.find(function(truckWaybill) {
                                        return truckWaybill.invoice_no.toString() === invoiceNo;
                                    });

                                    console.log('Pre-fill Matched Truck Waybill:', matchTruckWaybill);

                                    if (matchTruckWaybill) {
                                        jQuery('td[data-name="consignor_shipper"]').html(matchTruckWaybill.consignor_shipper);
                                        jQuery('#consignor_shipper_hidden').val(matchTruckWaybill.consignor_shipper);
                                        jQuery('td[data-name="consignee"]').html(matchTruckWaybill.consignee);
                                        jQuery('#consignee_hidden').val(matchTruckWaybill.consignee);

                                        // Skip pre-filling invoice_no if it's a clone action
                                        if (!isClone) {
                                            jQuery('#invoice_no_input').val(invoiceNo);
                                            jQuery('td[data-name="invoice_no"]').text(invoiceNo); // Update the corresponding table cell
                                        }

                                        jQuery('td[data-name="notify_party"]').html(matchTruckWaybill.notify_party);
                                        jQuery('#notify_party_hidden').val(matchTruckWaybill.notify_party);

                                        jQuery('td[data-name="mto_name_address"]').html(matchTruckWaybill.mto_name_address);
                                        jQuery('#mto_name_address_hidden').val(matchTruckWaybill.mto_name_address);

                                        jQuery('td[data-name="place_of_loading"]').html(matchTruckWaybill.place_of_loading);
                                        jQuery('#place_of_loading_hidden').val(matchTruckWaybill.place_of_loading);

                                        // Format the date to dd/mm/yyyy
                                        let dateParts = matchTruckWaybill.date_of_receipt.split('-');
                                        let formattedDate = `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;
                                        jQuery('td[data-name="date_of_receipt"]').html(formattedDate);
                                        jQuery('#date_of_receipt_hidden').val(matchTruckWaybill.date_of_receipt);

                                        jQuery('td[data-name="place_of_discharge"]').html(matchTruckWaybill.place_of_discharge);
                                        jQuery('#place_of_discharge_hidden').val(matchTruckWaybill.place_of_discharge);

                                        jQuery('td[data-name="final_destination"]').html(matchTruckWaybill.final_destination);
                                        jQuery('#final_destination_hidden').val(matchTruckWaybill.final_destination);

                                        jQuery('td[data-name="marks_and_no"]').html(matchTruckWaybill.marks_and_no);
                                        jQuery('#marks_and_no_hidden').val(matchTruckWaybill.marks_and_no);

                                        jQuery('td[data-name="no_of_packages"]').html(matchTruckWaybill.no_of_packages);
                                        jQuery('#no_of_packages_hidden').val(matchTruckWaybill.no_of_packages);

                                        jQuery('td[data-name="description_of_goods"]').html(matchTruckWaybill.description_of_goods);
                                        jQuery('#description_of_goods_hidden').val(matchTruckWaybill.description_of_goods);

                                        jQuery('td[data-name="gross_net_weight"]').html(matchTruckWaybill.gross_net_weight);
                                        jQuery('#gross_net_weight_hidden').val(matchTruckWaybill.gross_net_weight);

                                        jQuery('td[data-name="measurements"]').html(matchTruckWaybill.measurements);
                                        jQuery('#measurements_hidden').val(matchTruckWaybill.measurements);

                                        jQuery('td[data-name="container_no"]').html(matchTruckWaybill.container_no);
                                        jQuery('#container_no_hidden').val(matchTruckWaybill.container_no);

                                        jQuery('td[data-name="seal_no"]').html(matchTruckWaybill.seal_no);
                                        jQuery('#seal_no_hidden').val(matchTruckWaybill.seal_no);

                                        jQuery('td[data-name="freight_details"]').html(matchTruckWaybill.freight_details);
                                        jQuery('#freight_details_hidden').val(matchTruckWaybill.freight_details);

                                        jQuery('td[data-name="freight_payable_at"]').html(matchTruckWaybill.freight_payable_at);
                                        jQuery('#freight_payable_at_hidden').val(matchTruckWaybill.freight_payable_at);

                                        jQuery('td[data-name="place_date_of_issue"]').html(matchTruckWaybill.place_date_of_issue);
                                        jQuery('#place_date_of_issue_hidden').val(matchTruckWaybill.place_date_of_issue);

                                        jQuery('td[data-name="no_of_copies"]').html(matchTruckWaybill.no_of_copies);
                                        jQuery('#no_of_copies_hidden').val(matchTruckWaybill.no_of_copies);

                                        jQuery('td[data-name="truck_waybill_no"]').html(matchTruckWaybill.truck_waybill_no);
                                        jQuery('#truck_waybill_no_hidden').val(matchTruckWaybill.truck_waybill_no);

                                        jQuery('td[data-name="truck_no"]').html(matchTruckWaybill.truck_no);
                                        jQuery('#truck_no_hidden').val(matchTruckWaybill.truck_no);
                                    }
                                }
                            });
                        </script>












                    </div>

                </div>
                {{-- section 2 --}}
                <div class="intro-y col-span-12 lg:col-span-12">
                    <div class="intro-y box p-5">

                        <header class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                            <b>2. Custom Truck Waybill</b>
                        </header>
                        <div class="intro-y p-5 flex flex-col justify-center items-center w-full lg:flex">




                            <div id="content-to-be-converted"
                                style="position: relative; width:800px;  height: fit-content;">
                                <link
                                    href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap"
                                    rel="stylesheet">
                                <style>
                                    table {
                                        width: 100%;
                                        border-collapse: collapse;
                                        margin: 20px 0;
                                        font-size: 10px;

                                    }

                                    th,
                                    td {
                                        border: 1px solid rgb(150, 150, 150);
                                        padding: 8px;
                                        text-align: left;
                                        vertical-align: top;
                                    }

                                    th {
                                        background-color: #f2f2f2;
                                    }

                                    .header,
                                    .section-header {
                                        font-weight: bold;
                                    }

                                    .center {
                                        text-align: center;
                                        vertical-align: middle;
                                    }

                                    .small-text {
                                        font-size: 7.5px;
                                        width: 100%;
                                        word-wrap: break-word;
                                    }

                                    .font {
                                        font-family: 'Noto Sans Thai', sans-serif;
                                    }
                                </style>



                                <table>
                                    <tr>
                                        <td colspan="6" class="font header centered-img"
                                            style="border-bottom: none; padding-bottom: 0; ">Consignor / Shipper</td>

                                        <td colspan="4" rowspan="2" class="font center font centered-img">
                                            <img style="height: 70px;"
                                                src="data:image/png;base64,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">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="height: 60px; border-top: none;"
                                            data-name="consignor_shipper"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="font header "
                                            style="border-bottom: none; padding-bottom: 0; ">Consignee</td>
                                        <td colspan="4" class="font center no-border"><strong>TRUCK WAYBILL</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="height: 60px; border-top: none;" data-name="consignee">
                                        </td>
                                        <td colspan="1" class="font center" style="border-right: none; vertical-align: top; text-align: left; ">
                                            <strong>TRUCK WAYBILL No.</strong>
                                        </td>

                                        <td colspan="3" class="font center" data-name="truck_waybill_no" style="border-left: none; text-align: left;">
                                            <strong></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="font header"
                                            style="border-bottom: none; padding-bottom: 0; ">Notify Party</td>
                                        <td colspan="4" class="font header"
                                            style="border-bottom: none; padding-bottom: 0; ">Multimodal Transport Operator
                                            (MTO) Name and
                                            Address</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="height: 60px; border-top: none;" data-name="notify_party">
                                        </td>
                                        <td colspan="4" style="height: 60px; border-top: none;"
                                            data-name="mto_name_address"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" class="font header" style="border-right: none;">Invoice No.</td>
                                        <td colspan="5" style="height: 25px; border-left: none;" data-name="invoice_no"></td>
                                        <td colspan="1" class="font header" style="border-right: none;">Place of Loading</td>
                                        <td colspan="3" style="height: 25px; border-left: none; " data-name="place_of_loading"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" class="font header" style="border-right: none;">Date of Receipt</td>
                                        <td colspan="5" style="height: 25px; border-left: none; " data-name="date_of_receipt"></td>
                                        <td colspan="1" class="font header" style="border-right: none;">Place of Discharge</td>
                                        <td colspan="3" style="height: 25px; border-left: none; " data-name="place_of_discharge"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" class="font header" style="border-right: none;">Truck No.</td>
                                        <td colspan="5" style="height: 25px; border-left: none; " data-name="truck_no"></td>
                                        <td colspan="1" class="font header" style="border-right: none;">Final Destination</td>
                                        <td colspan="3" style="height: 25px; border-left: none; " data-name="final_destination"></td>
                                    </tr>
                                    <tr>
                                        <td class="font header" colspan="2"
                                            style="text-align: center; border-right: 1px solid rgb(198, 204, 200); border-bottom: none; text-decoration: underline; width:150px">
                                            Marks and No.</td>
                                        <td class="font header" colspan="2"
                                            style="text-align: center; border-right: 1px solid rgb(198, 204, 200); border-bottom: none; text-decoration: underline; width:130px">
                                            No. of Packages</td>
                                        <td class="font header" colspan="3"
                                            style="text-align: center; border-right: 1px solid rgb(198, 204, 200); border-bottom: none; text-decoration: underline; width:180px">
                                            Description of Goods</td>
                                        <td class="font header" colspan="1"
                                            style="text-align: center; border-right: 1px solid rgb(198, 204, 200); border-bottom: none; text-decoration: underline; width:100px">
                                            Gross/Net Weight</td>
                                        <td class="font header" colspan="2"
                                            style="text-align: center; border-right: 1px solid rgb(150, 150, 150); border-bottom: none; text-decoration: underline; width:100px">
                                            Measurements</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"
                                            style="height: 160px; border-right: 1px solid rgb(198, 204, 200); border-bottom: none; border-top: none; text-align: center;"
                                            data-name="marks_and_no"></td>
                                        <td colspan="2"
                                            style="height: 160px; border-right: 1px solid rgb(198, 204, 200); border-bottom: none; border-top: none; text-align: center;"
                                            data-name="no_of_packages"></td>
                                        <td colspan="3"
                                            style="height: 160px; border-right: 1px solid rgb(198, 204, 200); border-bottom: none; border-top: none; "
                                            data-name="description_of_goods"></td>
                                        <td colspan="1"
                                            style="height: 160px; border-right: 1px solid rgb(198, 204, 200); border-bottom: none; border-top: none; text-align: center;"
                                            data-name="gross_net_weight"></td>
                                        <td colspan="2"
                                            style="height: 160px; border-left: 1px solid rgb(198, 204, 200); border-bottom: none; border-top: none; text-align: center;"
                                            data-name="measurements"></td>
                                    </tr>

                                    <tr>
                                        <td class="font header" colspan="3"
                                            style="height: 20px; border-bottom: none; padding-bottom: 0;">Container No.
                                        </td>
                                        <td class="font header" colspan="2"
                                            style="height: 20px; border-bottom: none; padding-bottom: 0;">Seal No.</td>
                                        <td colspan="5" rowspan="3" class="font small-text"
                                            style="width: 300px; height: 60px;">
                                            Upon receipt, the goods are assumed to be in good condition, as far as can be
                                            reasonably
                                            ascertained by specified checks, unless stated otherwise. The Multimodal
                                            Transport Operator (MTO),
                                            in accordance with the provisions stated in this Multimodal Transport Document
                                            (MDT), agrees to
                                            carry out or arrange for the transportation of the goods from the point of
                                            receipt to the designated
                                            delivery location and takes responsibility for the entire transport process. It
                                            is essential to surrender
                                            one of the MDTs, duly endorsed, in exchange for the goods. Both MDTs have been
                                            signed as
                                            indicated below, and once one is completed, the other will become void.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height: 25px; border-top: none;"
                                            data-name="container_no"></td>
                                        <td colspan="2" style="height: 25px; border-top: none;" data-name="seal_no">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="font header"
                                            style="height: 5px; border-bottom: none; padding-bottom: 0;">
                                            Freight Details, Charges, and Etc.
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="5" style="height: 25px; border-top: none;"
                                            data-name="freight_details"></td>
                                        <td colspan="5" class="font header"
                                            style="border-bottom: none; padding-bottom: 0; ">Place and Date of Issue</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="font header"
                                            style="border-bottom: none; padding-bottom: 0; ">Freight Payable At</td>
                                        <td colspan="5" data-name="freight_payable_at" style="border-top: none;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="height: 25px; border-top: none;"
                                            data-name="place_date_of_issue"></td>
                                        <td colspan="5" class="font header">Authenticated (Signed) for : EXPRESS
                                            INTERTRADE
                                            CO., LTD.</td>
                                    </tr>
                                    <tr>
                                        <td class="font header" colspan="5"
                                            style="border-bottom: none; padding-bottom: 0; ">Number of Original Copies</td>
                                        <td colspan="5" rowspan="2" class="font center no-border"
                                            style="vertical-align: bottom; border-top: none;">
                                            By__________________________________<br>As Agent(s) for the carrier
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="height: 34px; border-top: none;"
                                            data-name="no_of_copies"></td>
                                    </tr>
                                </table>
                                {{-- <div
                                style="font-size: 10px;  font-family: 'Noto Sans Thai', sans-serif;">
                                {{ \Carbon\Carbon::now('Asia/Bangkok')->format('d/m/Y H:i:s') }}</div> --}}

                                <input type="hidden" name="consignor_shipper" id="consignor_shipper_hidden"
                                    value="">
                                <input type="hidden" name="consignee" id="consignee_hidden" value="">
                                <input type="hidden" name="truck_waybill_no" id="truck_waybill_no_hidden"
                                    value="">
                                <input type="hidden" name="truck_no" id="truck_no_hidden" value="">
                                <input type="hidden" name="notify_party" id="notify_party_hidden" value="">
                                <input type="hidden" name="mto_name_address" id="mto_name_address_hidden"
                                    value="">
                                {{-- <input type="hidden" name="invoice_no" id="invoice_no_hidden" value=""> --}}
                                <input type="hidden" name="place_of_loading" id="place_of_loading_hidden"
                                    value="">
                                <input type="hidden" name="date_of_receipt" id="date_of_receipt_hidden" value="">
                                <input type="hidden" name="place_of_discharge" id="place_of_discharge_hidden"
                                    value="">
                                <input type="hidden" name="final_destination" id="final_destination_hidden"
                                    value="">
                                <input type="hidden" name="marks_and_no" id="marks_and_no_hidden" value="">
                                <input type="hidden" name="no_of_packages" id="no_of_packages_hidden" value="">
                                <input type="hidden" name="description_of_goods" id="description_of_goods_hidden"
                                    value="">
                                <input type="hidden" name="gross_net_weight" id="gross_net_weight_hidden"
                                    value="">
                                <input type="hidden" name="measurements" id="measurements_hidden" value="">
                                <input type="hidden" name="container_no" id="container_no_hidden" value="">
                                <input type="hidden" name="seal_no" id="seal_no_hidden" value="">
                                <input type="hidden" name="freight_details" id="freight_details_hidden" value="">
                                <input type="hidden" name="freight_payable_at" id="freight_payable_at_hidden"
                                    value="">
                                <input type="hidden" name="place_date_of_issue" id="place_date_of_issue_hidden"
                                    value="">
                                <input type="hidden" name="no_of_copies" id="no_of_copies_hidden" value="">







                            </div>
                        </div>

                        {{-- for change to text area --}}
                        <script>
                            document.querySelectorAll('td[data-name]').forEach(function(td) {
                                td.addEventListener('dblclick', function() {
                                    let currentText = td.innerText.trim();
                                    let originalName = td.getAttribute('data-name');

                                    // Determine the input type based on the data-name attribute
                                    let input;
                                    if (originalName === 'date_of_receipt') {
                                        input = document.createElement('input');
                                        input.type = 'date';

                                        // Convert the current text from dd/mm/yyyy to yyyy-mm-dd for the date input value
                                        let dateParts = currentText.split('/');
                                        if (dateParts.length === 3) {
                                            input.value =
                                                `${dateParts[2]}-${dateParts[1].padStart(2, '0')}-${dateParts[0].padStart(2, '0')}`;
                                        }
                                    } else {
                                        input = document.createElement('textarea');
                                        input.value = currentText;
                                        input.style.width = '100%';
                                        input.style.height = td.style.height;
                                        input.style.fontSize = '9px'; // Set font size to 9px
                                        input.style.whiteSpace = 'pre-wrap'; // Preserve white spaces and new lines
                                    }

                                    td.innerHTML = '';
                                    td.appendChild(input);
                                    input.focus();

                                    input.addEventListener('blur', function() {
                                        let newText;
                                        if (input.type === 'date') {
                                            if (input.value) {
                                                let date = new Date(input.value);
                                                newText =
                                                    `${String(date.getDate()).padStart(2, '0')}/${String(date.getMonth() + 1).padStart(2, '0')}/${date.getFullYear()}`;
                                            } else {
                                                newText = '';
                                            }
                                        } else {
                                            newText = input.value;
                                            newText = newText.replace(/\n/g, '<br>').replace(/ {2,}/g, function(
                                                spaces) {
                                                return spaces.replace(/ /g, '&nbsp;');
                                            });
                                        }

                                        td.innerHTML = newText;
                                        td.setAttribute('data-name',
                                            originalName); // Restore the original data-name attribute

                                        // Update the corresponding hidden input field
                                        let hiddenInput = document.getElementById(originalName + '_hidden');
                                        if (hiddenInput) {
                                            if (input.type === 'date' && input.value) {
                                                // Convert the date value back to yyyy-mm-dd format for the hidden input field
                                                hiddenInput.value = input.value;
                                            } else {
                                                hiddenInput.value = newText;
                                            }
                                        }
                                    });
                                });
                            });
                        </script>





                    </div>
                    {{-- section 3 --}}
                    <div class="intro-y col-span-12 lg:col-span-12 mt-5">


                        <div class="intro-y box p-5">
                            <header class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                                <b>3. Operation</b>
                            </header>

                            <div class="grid grid-cols-12 gap-6 mt-5">

                                <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                                    <label for="edit_by" class="form-label">Edit By</label>
                                    <input id="edit_by" name="edit_by" type="text" class="form-control w-full"
                                        placeholder="Edit Name" readonly value="{{ auth()->user()->name }}">

                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                                    <label for="edit_date" class="form-label">Edit Date</label>
                                    <input id="edit_date" type="datetime-local" class="form-control w-full" readonly
                                        name="edit_date">
                                    <script>
                                        // Get current date and time
                                        var currentDateTime = new Date();

                                        // Format current date and time as YYYY-MM-DDTHH:MM (required by input type="datetime-local")
                                        var formattedDateTime = currentDateTime.getFullYear() + '-' +
                                            ('0' + (currentDateTime.getMonth() + 1)).slice(-2) + '-' +
                                            ('0' + currentDateTime.getDate()).slice(-2) + 'T' +
                                            ('0' + currentDateTime.getHours()).slice(-2) + ':' +
                                            ('0' + currentDateTime.getMinutes()).slice(-2);

                                        // Set the value of the input field
                                        document.getElementById("edit_date").value = formattedDateTime;
                                    </script>
                                </div>
                            </div>

                        </div>



                    </div>





                    {{-- button footer --}}
                    <div class="intro-y col-span-12 lg:col-span-12 flex justify-end gap-2 mt-5">
                        <button type="button" id="generate-pdf-btn" class="btn btn-primary">Generate PDF</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

        </form>

    </div>


    <script>
        document.getElementById('generate-pdf-btn').addEventListener('click', function() {
            // Get the HTML content of the element with ID 'content-to-be-converted'
            var htmlContent = document.getElementById('content-to-be-converted').innerHTML;

            // Create a new form element to submit HTML content to the server for PDF generation
            var form = document.createElement('form');
            form.action = '{{ route('pdf.single.truck-waybill') }}'; // Route for PDF generation
            form.method = 'POST'; // Use POST method
            form.style.display = 'none'; // Hide the form
            form.target = '_blank';

            // Create a hidden input field for CSRF token
            var csrfTokenInput = document.createElement('input');
            csrfTokenInput.type = 'hidden';
            csrfTokenInput.name = '_token'; // Laravel expects the CSRF token field to be named '_token'
            csrfTokenInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Append the CSRF token input field to the form
            form.appendChild(csrfTokenInput);

            // Create a textarea field to hold the HTML content
            var htmlInput = document.createElement('textarea');
            htmlInput.name = 'html_content'; // Name of the field
            htmlInput.value = htmlContent; // Set the value to the HTML content

            // Append the textarea field to the form
            form.appendChild(htmlInput);

            // Append the form to the document body
            document.body.appendChild(form);

            // Submit the form for PDF generation
            form.submit();

        });
    </script>

    <!-- Script for confirmation before closing the page -->
    <script>
        // Function to handle the beforeunload event
        function handleBeforeUnload(e) {
            var confirmationMessage = 'Are you sure you want to leave? Your changes may not be saved.';
            e.preventDefault();
            e.returnValue = confirmationMessage;
            return confirmationMessage;
        }

        // Add the beforeunload event listener when the page loads
        window.addEventListener('beforeunload', handleBeforeUnload);

        // Add event listeners after the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Remove beforeunload listener on form submit
            var form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function() {
                    window.removeEventListener('beforeunload', handleBeforeUnload);
                });
            }

            // Remove beforeunload listener on button click
            var generatePdfBtn = document.querySelector('#generate-pdf-btn');
            if (generatePdfBtn) {
                generatePdfBtn.addEventListener('click', function() {
                    window.removeEventListener('beforeunload', handleBeforeUnload);
                });
            }
        });
    </script>

@endsection
