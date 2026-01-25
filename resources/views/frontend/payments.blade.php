<div class="container-fluid mt-3 mb-1 bg-primary p-4 rounded">
    <h2 class="mb-4 text-white">Payment Methods</h2>

    <div class="row">
        @php
            $payments = [
                [
                    'name' => 'Jazz Cash',
                    'image' => 'img/payments/jazzcash.png',
                    'account' => '03349376619',
                    'title' => 'USMAN SALEEM MUFTI',
                    'label' => 'Account#',
                ],
                [
                    'name' => 'EASYPAISA',
                    'image' => 'img/payments/easypaisa.png',
                    'account' => '03349376619',
                    'title' => 'USMAN SALEEM MUFTI',
                    'label' => 'Account#',
                ],
                [
                    'name' => 'BANK AL HABIB',
                    'image' => 'img/payments/bank_al_habib.png',
                    'account' => 'PK14BAHL00210981010906017',
                    'title' => 'BURRAQ ENGINEERING SOLUTIONS',
                    'label' => 'IBAN',
                ],
                [
                    'name' => 'HBL',
                    'image' => 'img/payments/hbl.png',
                    'account' => 'PK22HABB0012487901995851',
                    'title' => 'USMAN SALEEM',
                    'label' => 'IBAN',
                ],
            ];
        @endphp

        @foreach ($payments as $payment)
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="card text-center shadow-sm h-100 payment-card bg-primary text-white rounded">
                    <img src="{{ asset($payment['image']) }}" class="card-img-top mx-auto mt-3 payment-img rounded-circle"
                        alt="{{ $payment['name'] }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $payment['name'] }}</h5>
                        <p class="mb-1">{{ $payment['label'] }}: {{ $payment['account'] }}</p>
                        <p class="mb-0">{{ $payment['title'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
