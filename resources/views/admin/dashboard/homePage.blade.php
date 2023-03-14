@extends('admin.layout.index')

@section('title', 'Dashboard')

@section('content')
    <main class="dashboard">
        <h1>Dashboard</h1>

        <div class="insights mt-4">
            <div class="sales">
                <span class="material-symbols-sharp">analytics</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Sales</h3>
                        <h1>${{ $totalSale }}</h1>
                    </div>
                    <div class="progress-circle">
                        <div class="c100 p{{ $totalSalePercent }} center">
                            <span>{{ $totalSalePercent }}%</span>
                            <div class="slice">
                                <div class="bar"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Sales -->
            <div class="expenses">
                <span class="material-symbols-sharp">bar_chart</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Expenses</h3>
                        <h1>${{ $totalExpenses }}</h1>
                    </div>
                    <div class="progress-circle">
                        <div class="c100 p{{ $ExpensesPercent }} center">
                            <span>{{ $ExpensesPercent }}%</span>
                            <div class="slice">
                                <div class="bar"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Expenses -->
            <div class="income d-flex justify-content-center align-items-center">
                <span class="material-symbols-sharp">stacked_line_chart</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Income</h3>
                        <h1>${{ $totalIncome }}</h1>
                    </div>

                </div>

            </div>
            <!-- End of Income -->
        </div>
        <!-- End of insight -->

        <div class="recent-orders">
            @if ($orders->count() != 0)
                <h2>Recent Order</h2>
                <table class="">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Number</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->mainId }}</td>
                                <td class="warning">Panding</td>
                                <td class="primary"><a
                                        href="{{ route('admin#orderDetailsPage', $order->id) }}">Deatails</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <a href="{{ route('admin#orderList') }}">Show All</a>
            @else
                <h1 class="text-center text-light p-5 my-5 bg-secondary rounded">There is no Recent Order !</h1>
            @endif

        </div>
    </main>
@endsection
