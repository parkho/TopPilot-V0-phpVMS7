@extends('toppilot::layouts.frontend')

@section('title', 'TopPilot')

@section('content')
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active mr-1" id="flighttime-tab" data-toggle="tab" data-target="#flighttime" type="button" role="tab" aria-controls="nav-flighttime" aria-selected="true">Top Pilots Flight Time</button>
    <button class="nav-link mr-1" id="distance-tab" data-toggle="tab" data-target="#distance" type="button" role="tab" aria-controls="nav-distance" aria-selected="false">Top Pilots Distance</button>
    <button class="nav-link mr-1" id="nav-landingrate-tab" data-toggle="tab" data-target="#landingrate" type="button" role="tab" aria-controls="nav-landingrate" aria-selected="false">Top Pilots Landing Rate</button>
    <button class="nav-link mr-1" id="nav-bestrevenue-tab" data-toggle="tab" data-target="#bestrevenue" type="button" role="tab" aria-controls="nav-bestrevenue" aria-selected="false">Top Pilots Best Revenue</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="flighttime" role="tabpanel" aria-labelledby="flighttime-tab">
        <div class="row">
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">Today - {{ $Day }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Flight Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultftDay as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>
                                        @php
                                            $minutes = $result->flighttime;
                                            $hours = floor($minutes / 60); // Calculate hours from minutes
                                            $remaining_minutes = $minutes % 60; // Calculate remaining minutes
                                            $time_format = gmdate('H:i:s', mktime($hours, $remaining_minutes, 0));
                                            echo $time_format;
                                        @endphp
                                        {{ $hours }}:{{ $remaining_minutes }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">This Month - {{ $Month }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Flight Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultftMonth as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>
                                        @php
                                            $minutes = $result->flighttime;
                                            $hours = floor($minutes / 60);
                                            $remaining_minutes = $minutes % 60;
                                        @endphp
                                        {{ $hours }}:{{ $remaining_minutes }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">This Year - {{ $Year }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Flight Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultftYear as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>
                                        @php
                                            $minutes = $result->flighttime;
                                            $hours = floor($minutes / 60);
                                            $remaining_minutes = $minutes % 60;
                                        @endphp
                                        {{ $hours }}:{{ $remaining_minutes }}                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show" id="distance" role="tabpanel" aria-labelledby="distance tab-tab">
        <div class="row">
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">Today - {{ $Day }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Distance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultdDay as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>{{ floor($result->distance) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">This Month - {{ $Month }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Distance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultdMonth as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>{{ floor($result->distance) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">This Year - {{ $Year }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Distance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultdYear as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>{{ floor($result->distance) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show" id="landingrate" role="tabpanel" aria-labelledby="landingrate tab-tab">
        <div class="row">
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">Today - {{ $Day }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Landing Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultlrDay as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>{{ $result->landing_rate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">This Month - {{ $Month }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Landing Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultlrMonth as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>{{ $result->landing_rate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">This Year - {{ $Year }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Landing Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultlrYear as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->user_name }}</td>
                                    <td>{{ $result->landing_rate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show" id="bestrevenue" role="tabpanel" aria-labelledby="bestrevenue tab-tab">
        <div class="row">
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">Today - {{ $Day }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Best Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($resultbrDay as $index => $result)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $result['name'] }}</td>
                                <td>
                                $ {{ number_format($result['total_balance'], 2) }}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">This Month - {{ $Month }}</div>
                <div class="card-body">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Best Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($resultbrDay as $index => $result)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $result['name'] }}</td>
                                <td>
                                $ {{ number_format($result['total_balance'], 2) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 col-lg-12">
                <div class="card-header mt-3 mb-3">This Year - {{ $Year }}</div>
                <div class="card-body">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Best Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($resultbrDay as $index => $result)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $result['name'] }}</td>
                                <td>
                                $ {{ number_format($result['total_balance'], 2) }}
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
@endsection
