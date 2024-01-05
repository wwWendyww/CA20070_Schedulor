{{--
BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}

@extends('/layouts.parent')
@section('title')
Payment | Schedulor
@endsection
@section('content')
<div class="row text-center p-3 subscription mb-3" style="background-color: aliceblue">
    <div>
        <h1 class="pagetitle" style="font-size: 3rem">Complete Your Payment</h1>
    </div>
</div>
<div class="row justify-content-center align-items-stretch g-2 p-4  ">
    <div class="col-8 me-3 p-4 ">
        <h4 class="h5">
            Fill in Your Credit Information
        </h4>
        <div class="row ">
            <form action="/paymentprocess" method="POST" class="form w-100 ">
                @csrf
                <div class="mb-3">
                    <label for="bankInfo" class="form-label">Bank Account Number</label>
                    <input type="text" class="form-control" name="bankInfo" id="bankInfo" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="Bank" class="form-label">Bank</label>
                    <select class="form-select" id="bank" name="bank">
                        <option value="MAYBANK">MAYBANK</option>
                        <option value="RHB">RHB</option>
                        <option value="HSBC">HSBC</option>
                    </select>
                </div>
                {{-- if address !== "" --}}
                <div class="mb-5">
                    <label for="w" class="form-label">Billing Address</label>
                    <input type="text" class="form-control" name="billaddress" id="billaddress"
                        aria-describedby="helpId" placeholder="" />
                </div>
                <div class="align-self-end mt-5">
                    <button type="submit" class="btn btn-primary w-25">Pay</button>
                </div>
        </div>
    </div>
    </form>
    <div class="col-3 p-4" style="border-left : 1px solid grey">
        <h4 class="h5">
            Billing Information
        </h4>
        <table class="table" style="width:100%; border: 0px none white">
            <thead>
                <tr>
                    <th style="width: 75%">Subscription Plan</th>
                    <th style="width: 25%">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td style="width: 75%">Premium</th>
                    <td style="width: 25%" class="text-center">10.00</td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td style="width: 75%">
                        Service Charge (6%)
                    </td>
                    <td style="width: 25%" class="text-center">0.60</td>
                </tr>
                <tr>
                    <th style="width: 75%">
                        Total
                    </th>
                    <th style="width: 25%" class="text-center">10.60</th>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection