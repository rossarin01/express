<div>
    <div class="text-right mb-5">
        {{-- @livewire('components.assets.button', ['color' => 'secondary', 'title' => 'กลับสู่หน้ารายการ Invoice', 'icon' => 'corner-up-left', 'route' => 'invoice.index', 'action' => '']) --}}

        <a href="{{ route('invoice.index') }}" class="btn btn-outline-secondary btn-rounded w-36 mr-2 mb-2">
            <i class="fas fa-corner-up-left mr-2"></i> กลับสู่หน้ารายการ Invoice
        </a>
        <a href="{{ route('invoice.print', ['invoiceId' => $invoice->invoice_no]) }}"
            class="btn btn-outline-success btn-rounded w-36 mr-2 mb-2" target="_blank">
            <i class="fas fa-print mr-2"></i> Preview
        </a>
    </div>
    <form action="{{ route('invoice.store', ['id' => $invoice->invoice_no]) }}" method="POST">


        @csrf
        <div class="page-header">


            {{-- section 1 --}}
            <div class="intro-y box p-5">
                <header class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                    <b>1. Fill in Job No.</b>
                </header>
                <div class="grid grid-cols-12 mt-5 gap-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 lg:col-span-6">
                                <label for="job_no" class="form-label">Job No.</label>
                                <select id="job_no" name="job_no" class="form-control mr-2">
                                    <option value="" disabled>Select job No.</option>
                                    <option value="">Please select job</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->job_no }}"
                                            {{ $job->job_no == $invoice->job_no ? 'selected' : '' }}>
                                            {{ $job->job_no }}
                                        </option>
                                    @endforeach
                                </select>
                                <script>
                                    jQuery('#job_no').select2();
                                </script>
                            </div>

                            <div class="col-span-12 lg:col-span-6">
                                <label for="draft_no" class="form-label">Draft No.</label>
                                <input id="draft_no" name="draft_no" type="text" class="form-control"
                                    placeholder="Draft No." value="" readonly>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                            <label for="shipper_name" class="form-label">Shipper Name</label>
                            <input id="shipper_name" name="shipper_name" type="text" class="form-control w-full"
                                placeholder="Shipper Name" readonly>
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control w-full">
                                <option value="Get" {{ $invoice->status == 'Get' ? 'selected' : '' }}>Get</option>
                                <option value="ยกเลิกโดยไม่มีการเก็บเงิน"
                                    {{ $invoice->status == 'ยกเลิกโดยไม่มีการเก็บเงิน' ? 'selected' : '' }}>
                                    ยกเลิกโดยไม่มีการเก็บเงิน</option>
                                <option value="เก็บเงินแล้วแต่ไม่ได้ออกใบเสร็จ"
                                    {{ $invoice->status == 'เก็บเงินแล้วแต่ไม่ได้ออกใบเสร็จ' ? 'selected' : '' }}>
                                    เก็บเงินแล้วแต่ไม่ได้ออกใบเสร็จ</option>
                            </select>
                        </div>

                    </div>

                    <div class="intro-y col-span-12 lg:col-span-6">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="agent_name" class="form-label">Agent Name</label>
                            <input id="agent_name" name="agent_name" type="text" class="form-control w-full"
                                placeholder="Agent Name" readonly>
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                            <label for="destination_port" class="form-label">Port</label>
                            <input id="destination_port" name="destination_port" type="text"
                                class="form-control w-full" placeholder="Port" value="" readonly>
                        </div>
                    </div>
                </div>


                <script>
                    jQuery(document).ready(function() {
                        // Trigger the change event if there is a pre-selected job_no
                        var preSelectedJobNo = jQuery('#job_no').val();
                        if (preSelectedJobNo) {
                            jQuery('#job_no').trigger('change');
                        }
                    });

                    jQuery('#job_no').on('change', function() {
                        var jobNo = jQuery(this).val();
                        var invoiceNo = getInvoiceNoFromUrl();

                        function getInvoiceNoFromUrl() {
                            var url = window.location.href;
                            var segments = url.split('/');
                            return segments[segments.length - 1];
                        }

                        var url = "{{ route('get-draft', [':job_no', ':invoice_no']) }}"
                            .replace(':job_no', jobNo)
                            .replace(':invoice_no', invoiceNo);

                        jQuery.ajax({
                            url: url,
                            type: 'GET',
                            success: function(response) {
                                console.log(response);

                                // Prefill the fields with response data
                                jQuery('#draft_no').val(response.draft_no);
                                jQuery('#shipper_name').val(response.shipper_name);
                                jQuery('#agent_name').val(response.agent_name);
                                jQuery('#destination_port').val(response.destination_port);
                                jQuery('#booking_no').val(response.booking_no);
                                jQuery('#ref_no').val(response.customer_ref);

                                // Clear existing rows and add new rows for descriptions
                                var $tbody = jQuery('#sells-tbody');
                                $tbody.empty(); // Clear the existing rows



                                // Add rows for sell data
                                var sells = response.sells; // Assume response.sells contains the sell data
                                var invoice_informations = response.invoice_informations;

                                sells.forEach(function(sell, index) {
                                    var $row = jQuery('<tr>');

                                    var correspondingInvoiceInfo = invoice_informations.find(function(
                                        info) {
                                        return info.sell_id === sell.id;
                                    });

                                    var $informationCell = jQuery('<td>').append(
                                        jQuery('<input>')
                                        .attr('type', 'text')
                                        .attr('step', 'any')
                                        .addClass('sell-information-cell')
                                        .attr('id', 'sell-information-' + (index + 1))
                                        .attr('name', 'sell-information-' + (index + 1))
                                        .attr('style', 'width: 100%; font-size: 0.85rem;')
                                        .val(correspondingInvoiceInfo ? correspondingInvoiceInfo
                                            .information : '')
                                    );

                                    var $descriptionCell = jQuery('<td>').append(
                                        jQuery('<input>')
                                        .addClass('form-control')
                                        .attr('type', 'text')
                                        .attr('name', 'sell-description-name-' + (index + 1))
                                        .attr('style', 'width: 100%; font-size: 0.85rem;')
                                        .attr('readonly', true)
                                        .val(sell.description.description) // Display the description
                                    );

                                    var $hiddenSellIdCell = jQuery('<td>').append(
                                        jQuery('<input>')
                                        .addClass('form-control')
                                        .attr('type', 'text')
                                        .attr('name', 'sell_id-' + (index + 1))
                                        .attr('style', 'width: 100%; font-size: 0.85rem; display:none;')
                                        .attr('readonly', true)
                                        .attr('value', sell.id) // Set the value to the ID
                                    );

                                    var $invoiceDescriptionCell = jQuery('<td>').append(
                                        jQuery('<input>')
                                        .attr('type', 'text')
                                        .attr('step', 'any')
                                        .addClass('sell-value-cell')
                                        .attr('id', 'sell-invoice-description-' + (index + 1))
                                        .attr('name', 'sell-invoice-description-' + (index + 1))
                                        .attr('value', sell.description.invoice_description || '')
                                        .attr('style', 'width: 100%; font-size: 0.85rem;')
                                        .prop('readonly', true)
                                    );

                                    var $valueCell = jQuery('<td>').append(
                                        jQuery('<input>')
                                        .attr('type', 'number')
                                        .attr('step', 'any')
                                        .addClass('sell-value-cell')
                                        .attr('id', 'sell-value-' + (index + 1))
                                        .attr('name', 'sell-value-' + (index + 1))
                                        .attr('value', sell.value)
                                        .attr('style', 'width: 100%; font-size: 0.85rem;')
                                        .prop('readonly', true)
                                    );

                                    var $rateCell = jQuery('<td>').css('text-align', 'center').append(
                                        jQuery('<input>')
                                        .attr('type', 'checkbox')
                                        .addClass('sell-rate-checkbox')
                                        .attr('id', 'sell-rate-' + (index + 1))
                                        .attr('name', 'sell-rate-' + (index + 1))
                                        .attr('value', 'true')
                                        .prop('checked', sell.rate)
                                        .prop('disabled', true)
                                    );

                                    var $vatCell = jQuery('<td>').css('text-align', 'center').append(
                                        jQuery('<input>')
                                        .attr('type', 'checkbox')
                                        .addClass('sell-vat-checkbox')
                                        .attr('id', 'sell-vat-' + (index + 1))
                                        .attr('name', 'sell-vat-' + (index + 1))
                                        .attr('value', 'true')
                                        .prop('checked', sell.vat)
                                        .prop('disabled', true)
                                    );

                                    var $taxCell = jQuery('<td>').append(
                                        jQuery('<input>')
                                        .attr('type', 'number')
                                        .attr('step', 'any')
                                        .addClass('sell-tax-cell')
                                        .attr('id', 'sell-tax-' + (index + 1))
                                        .attr('name', 'sell-tax-' + (index + 1))
                                        .attr('value', sell.tax)
                                        .attr('style', 'width: 100%; font-size: 0.85rem;')
                                        .prop('readonly', true)
                                    );

                                    var $amountCell = jQuery('<td>').css('font-size', '0.85rem').css(
                                        'text-align', 'center').text(
                                        sell.rate ? (sell.value * response.job.sell_rate_value) : sell
                                        .value
                                    );

                                    $hiddenSellIdCell.hide(); // Hide the hidden input field

                                    $row.append(
                                        $descriptionCell,
                                        $hiddenSellIdCell, // Append the hidden input field
                                        $invoiceDescriptionCell,
                                        $informationCell,
                                        $valueCell,
                                        $rateCell,
                                        $vatCell,
                                        $taxCell,
                                        $amountCell
                                    );

                                    $tbody.append($row);
                                });

                                // Add rows for each description if they exist in the response
                                for (let i = 1; i <= 5; i++) {
                                    var descriptionKey = 'invoice_sell_description_' + i;
                                    var descriptionValue = response.invoice_sell_descriptions[descriptionKey] || '';

                                    // Always create a row, even if the description is empty
                                    var $row = jQuery('<tr>');
                                    $row.append(
                                        jQuery('<td>').attr('colspan', 8).css('text-align', 'center').append(
                                            jQuery('<input>')
                                            .attr('type', 'text')
                                            .addClass('form-control')
                                            .attr('name', descriptionKey)
                                            .attr('style', 'width: 100%; font-size: 0.85rem;')
                                            .val(descriptionValue)
                                        )
                                    );
                                    $tbody.append($row);
                                }
                            },
                            error: function(xhr) {
                                if (xhr.status === 404) {
                                    alert('No draft found for the selected job.');
                                    jQuery('#draft_no').val('');
                                    jQuery('#shipper_name').val('');
                                    jQuery('#agent_name').val('');
                                    jQuery('#destination_port').val('');
                                }
                            }
                        });
                    });
                </script>





            </div>
        </div>



        {{-- section 2 --}}
        <div class="intro-y box p-5 mt-5">
            <header class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                <b>2. Sell Information</b>
            </header>
            <div class="overflow-x-auto">
                <table id="costTable" class="table table-bordered table-hover" style="padding: 0; text-align: center;">
                    <thead class="table-dark">
                        <tr>
                            <th>Description</th>
                            <th>Invoice Description</th>
                            <th>Information</th>
                            <th>Value</th>
                            <th>Rate</th>
                            <th>Vat</th>
                            <th>Tax</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="sells-tbody">
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="sell-description-name-1"
                                    style="width: 100%; font-size: 0.85rem;" readonly>
                                <input type="text" class="form-control" name="sell_id-1"
                                    style="width: 100%; font-size: 0.85rem; display:none;">
                            </td>

                            <td>
                                <input type="text" step="any" class="sell-value-cell"
                                    id="sell-invoice-description-1" name="sell-invoice-description-1" value=""
                                    style="width: 100%; font-size: 0.85rem;" readonly>
                            </td>
                            <td>
                                <input type="text" step="any" class="sell-value-cell"
                                    id="sell-invoice-infromation-1" name="sell-invoice-infromation-1" value=""
                                    style="width: 100%; font-size: 0.85rem;">
                            </td>
                            <td>
                                <input type="number" step="any" class="sell-value-cell" id="sell-value-1"
                                    name="sell-value-1" value="" style="width: 100%; font-size: 0.85rem;"
                                    readonly>
                            </td>
                            <td style="text-align: center;">
                                <input type="checkbox" class="sell-rate-checkbox" id="sell-rate-1"
                                    name="sell-rate-1" value="true" disabled>
                            </td>
                            <td style="text-align: center;">
                                <input type="checkbox" class="sell-vat-checkbox" id="sell-vat-1" name="sell-vat-1"
                                    value="true" disabled>
                            </td>
                            <td>
                                <input type="number" step="any" class="sell-tax-cell" id="sell-tax-1"
                                    name="sell-tax-1" value="" style="width: 100%; font-size: 0.85rem;"
                                    readonly>
                            </td>
                            <td class="amount-cell" style="font-size: 0.85rem; text-align: center;"></td>
                        </tr>

                    </tbody>



                </table>

            </div>

            <div class="mt-5 mb-2">
                <button id="addCostRowBtn" class="btn btn-primary rounded-full" type="button">เพิ่ม</button>

                <button id="deleteCostRowBtn" class="btn btn-danger rounded-full" type="button">ลบ
                </button>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let rowCount = 5; // Initialize row count based on existing rows
                        const maxRows = 5; // Maximum number of rows allowed

                        // Function to add a new row
                        function addRow() {
                            // Check if the maximum number of rows has been reached
                            if (rowCount >= maxRows) {
                                alert('Cannot add more rows. The maximum number of rows is 5.');
                                return;
                            }
                            rowCount++;
                            const newRow = `
                                <tr>
                                    <td colspan="8" style="text-align: center;">
                                        <input type="text" class="form-control" name="invoice_sell_description_${rowCount}"
                                            style="width: 100%; font-size: 0.85rem;">
                                    </td>
                                </tr>
                            `;
                            document.querySelector('#sells-tbody').insertAdjacentHTML('beforeend', newRow);
                        }

                        // Function to delete the last row
                        function deleteRow() {
                            const tbody = document.querySelector('#sells-tbody');
                            // Check if there are rows to delete
                            if (rowCount === 0) {
                                alert('No rows to delete.');
                                return;
                            }
                            tbody.deleteRow(-1);
                            rowCount--;
                        }

                        // Event listeners for buttons
                        document.querySelector('#addCostRowBtn').addEventListener('click', addRow);
                        document.querySelector('#deleteCostRowBtn').addEventListener('click', deleteRow);
                    });
                </script>



            </div>
        </div>

        {{-- section 3 --}}
        <div class="intro-y box p-5 mt-5">
            <header class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                <b>3. Invoice Information</b>
            </header>
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="intro-y col-span-12 lg:col-span-6" style="margin-left: 10px">
                    <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                        <label for="booking_no" class="form-label">Booking No.</label>
                        <input id="booking_no" name="booking_no" type="text" class="form-control w-full"
                            placeholder="Booking No." value="" readonly>
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                        <label for="bl_no" class="form-label">B/L No.</label>
                        <input id="bl_no" name="bl_no" type="text" class="form-control w-full"
                            placeholder="B/L No." value="{{ $invoice->bl_no }}">
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                        <label for="container_no" class="form-label">Container No.</label>
                        <input id="container_no" name="container_no" type="text" class="form-control w-full"
                            placeholder="Container No." value="{{ $invoice->container_no }}">
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input id="due_date" name="due_date" type="date" class="form-control w-full"
                            value="{{ $invoice->due_date }}">
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                        <label for="ref_no" class="form-label">Ref No.</label>
                        <input id="ref_no" name="ref_no" type="text" class="form-control w-full"
                            placeholder="Ref No." value="" readonly>
                    </div>
                </div>
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                        <label for="attn" class="form-label">Attn</label>
                        <input id="attn" name="attn" type="text" class="form-control w-full"
                            placeholder="Attn" value="{{ $invoice->attn }}">
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                        <label for="ETD_date" class="form-label">Date Of Departure</label>
                        <input id="ETD_date" name="ETD_date" type="text" class="form-control w-full"
                            placeholder="Date Of Departure" value="{{ $invoice->ETD_date }}">
                            {{-- @php
                                dd($invoice);
                            @endphp --}}
                    </div>

                    <header class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5 mt-5">
                        <p>Remark</p>
                    </header>
                    <div class="intro-y col-span-12 lg:col-span-6 mt-2">
                        <textarea rows="5" name="remark" class="form-control w-full" placeholder="Remark">{{ $invoice->remark }}</textarea>
                    </div>
                </div>
            </div>
        </div>




        {{-- section 4 --}}
        <div class="intro-y box p-5 mt-5">
            <header class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                <b>4. Operation</b>
            </header>
            <div class="grid grid-cols-12 gap-6 mt-5">

                <div class="intro-y col-span-12 lg:col-span-3 mt-2">
                    <label for="invoice_no" class="form-label">Invoice No.</label>
                    <input id="invoice_no" name="invoice_no" type="text" class="form-control w-full"
                        placeholder="invoice No." value="{{ $invoice->invoice_no }}" readonly>
                </div>



                <div class="intro-y col-span-12 lg:col-span-3 mt-2">
                    <label for="invoice_date" class="form-label">Invoice Date</label>
                    <input id="invoice_date" name="invoice_date" type="date" class="form-control w-full"
                        placeholder="invoice Date"
                        value="{{ $invoice ? ($invoice->invoice_date ? \Carbon\Carbon::parse($invoice->invoice_date)->format('Y-m-d') : '') : '' }}">
                </div>






                <div class="intro-y col-span-12 lg:col-span-3 mt-2">
                    <label for="prepared_by" class="form-label">Prepared By</label>
                    <input id="prepared_by" name="prepared_by" type="text" class="form-control w-full"
                        placeholder="Edit Name" readonly value="{{ optional($invoice->preparedBy)->name }}">


                </div>
                <div class="intro-y col-span-12 lg:col-span-3 mt-2">
                    <label for="created_at" class="form-label">Prepared Date</label>
                    <input id="created_at" type="date" class="form-control w-full" readonly name="created_at"
                        value="{{ $invoice ? ($invoice->created_at ? \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d') : '') : '' }}">

                </div>

                <div class="intro-y col-span-12 lg:col-span-3 mt-2">
                    <label for="edit_by" class="form-label">Edit By</label>
                    <input id="edit_by" name="edit_by" type="text" class="form-control w-full"
                        placeholder="Edit Name" readonly value="{{ optional($invoice->editedBy)->name }}">

                </div>
                <div class="intro-y col-span-12 lg:col-span-3 mt-2">
                    <label for="edit_date" class="form-label">Edit Date</label>
                    <input id="edit_date" type="date" class="form-control w-full" readonly name="edit_date"
                        value="{{ $invoice ? ($invoice->edit_date ? \Carbon\Carbon::parse($invoice->edit_date)->format('Y-m-d') : '') : '' }}">
                </div>




            </div>

            <div class="text-right mt-5">
                @livewire('components.assets.button-type', ['color' => 'primary', 'title' => 'บันทึกข้อมูล', 'icon' => 'save', 'action' => '', 'type' => 'submit'])
            </div>
    </form>


</div>
