@extends('layouts.master')
@section('title', 'Agent Commission')
@section('main-content')

    <main>
        <div class="container-fluid" id="Category">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Agent Commission Entry</span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-2">
                        <div class="card-header d-flex justify-content-between">
                            <div class="table-head">
                                @if (@isset($commissionData))
                                    <i class="fas fa-edit"></i> Agent Commission Update
                                @else
                                    <i class="fab fa-bandcamp"></i> Agent Commission Entry
                                @endif
                            </div>
                            {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                        </div>

                        <div class="card-body table-card-body">
                            <form method="post"
                                action="{{ @$commissionData ? route('agentCommissionUpdate', $commissionData->id) : route('agentCommissionStore') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-3 col-form-label">Agent <span
                                                    style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="customer_id" id="customer_id"
                                                    class="form-control form-control-sm shadow-none">
                                                    <option value="">--Select Agent--</option>
                                                    @foreach ($agent as $item)
                                                        <option data-id="{{ $item->total_point }}"
                                                            value="{{ $item->id }}"
                                                            {{ @$commissionData->customer_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="price" class="col-sm-3 col-form-label">Agent Point <span
                                                    style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="agent_point" id="agent_point"
                                                    value="{{ @$commissionData ? @$commissionData->agent_point : old('agent_point') }}"
                                                    class="form-control form-control-sm shadow-none agent_point">
                                                @error('agent_point')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="date" class="col-sm-2 col-form-label"> Date <span
                                                    style="color: red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="date" name="date"
                                                    value="{{ @$commissionData ? @$commissionData->date : old('date') }}"
                                                    class="form-control form-control-sm shadow-none">
                                                @error('date')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Payment Type <span
                                                    style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="payment_type" id="payment_type"
                                                    class="form-control form-control-sm shadow-none">
                                                    <option value="">-- Payment Type --</option>
                                                    <option value="Cash"
                                                        {{ @$commissionData->payment_type == 'Cash' ? 'selected' : '' }}>
                                                        Cash</option>
                                                    <option value="Gift"
                                                        {{ @$commissionData->payment_type == 'Gift' ? 'selected' : '' }}>
                                                        Gift</option>
                                                    <option value="Air_Ticket"
                                                        {{ @$commissionData->payment_type == 'Air_Ticket' ? 'selected' : '' }}>
                                                        Air Ticket</option>
                                                </select>
                                                @error('payment_type')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="amount" class="col-sm-2 col-form-label" id="amountLabel"
                                                @if (@$commissionData->payment_type != 'Cash') style="display: none;" @endif>Amount</label>
                                            <div class="col-sm-3" id="amountField"
                                                @if (@$commissionData->payment_type != 'Cash') style="display: none;" @endif>
                                                <input type="number" name="amount"
                                                    value="{{ @$commissionData ? @$commissionData->amount : old('amount') }}"
                                                    class="form-control form-control-sm shadow-none">
                                                @error('amount')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="col-sm-5" id="amni"
                                                @if (@$commissionData->payment_type == 'Cash') style="display: none" @endif></div>



                                            <label for="price" class="col-sm-3 col-form-label">Balance Point </label>
                                            <div class="col-sm-9">
                                                <input type="number" step="any" name="balance_point" id="balance_point"
                                                    value="{{ @$commissionData ? @$commissionData->balance_point : old('balance_point') }}"
                                                    class="form-control form-control-sm shadow-none balance_point">
                                                @error('balance_point')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <label for="title" class="col-sm-3 col-form-label">Note </label>
                                            <div class="col-sm-9">
                                                <textarea name="note" class="form-control form-control-sm shadow-none" placeholder="Note" rows="4">{{ @$commissionData ? @$commissionData->note : old('note') }}</textarea>
                                                @error('note')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <hr class="my-2">
                                            <div class="clearfix">
                                                <div class="text-end m-auto">
                                                    <button type="submit"
                                                        class="btn btn-success shadow-none">{{ @$commissionData ? 'Update change' : 'Save change' }}</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card my-2">
                        <div class="card-header d-flex justify-content-between">
                            <div class="table-head"><i class="fas fa-table me-1"></i> Agent Commission</div>
                            <div class="float-right">

                            </div>
                        </div>
                        <div class="card-body table-card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="datatablesSimple" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Agent Name</th>
                                            <th>Agent Point</th>
                                            <th>Payment Type</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agentCom as $item)
                                            <tr class="{{ $item->id }}">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ @$item->customer->name }}</td>
                                                <td>{{ $item->agent_point }}</td>
                                                <td>{{ $item->payment_type }}</td>
                                                <td>{{ @$item->amount }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>{{ $item->note }}</td>

                                                <td>
                                                    <a href="{{ route('agentCommissionEdit', $item->id) }}"
                                                        class="btn btn-edit shadow-none"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('agentCommissionDelete') }}" id="delete"
                                                        data-token="{{ csrf_token() }}" data-id="{{ $item->id }}"
                                                        class="btn btn-delete shadow-none"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("select[name='customer_id']").on('change', function(event) {
                if (event.target.value) {
                    var point = $("#customer_id option:selected").attr("data-id");
                    $("#balance_point").val(point);
                } else {
                    $("#balance_point").val(0);
                }
            });

            // sumValues();
        });


        function sumValues() {
            const agentP = parseFloat($('.agent_point').val()) || 0;
            const balanceP = parseFloat($('.balance_point').val()) || 0;
            const sum = balanceP - agentP;
            $('#balance_point').text(sum);
            console.log(sum);
        }

        $('.agent_point, .balance_point').on('keyup', sumValues);

       
    </script>

    <script>
        paymentOnchange();

        function paymentOnchange() {
            document.getElementById("payment_type").addEventListener("change", function() {
                var paymentType = this.value;
                if (paymentType === "Cash") {
                    document.getElementById("amountLabel").style.display = "block";
                    document.getElementById("amountField").style.display = "block";
                    document.getElementById("amni").style.display = "none";
                } else {
                    document.getElementById("amountLabel").style.display = "none";
                    document.getElementById("amountField").style.display = "none";
                    document.getElementById("amni").style.display = "block";
                }

            });
        }
    </script>

<script>
    var agentPointInput = document.getElementById("agent_point");
    var balancePointInput = document.getElementById("balance_point");
    agentPointInput.addEventListener("change", function() {
        var agentPointValue = parseFloat(agentPointInput.value);
        var balancePointValue = parseFloat(balancePointInput.value);

        if (agentPointValue > balancePointValue) {
            alert("Agent Point value should not exceed Balance Point value.");
            agentPointInput.value = balancePointValue;
        }
    });
</script>

@endpush
