@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customers List</div>

                <div class="card-body">
                    <table class="table table-bordered tablelist">
                        <thead>
                            <tr>
                                <th>
                                    Sr.N.
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $key => $item)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if ($item->approved)
                                            <a href="javascript:void(0)" url="{{url('customer/'.(string)$item->id)}}" class="btn send-btn btn-icon-split btn-danger">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-close"></i>
                                                </span>
                                                <span class="text">Reject</span>
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" url="{{url('customer/'.(string)$item->id)}}" class="btn send-btn btn-icon-split btn-primary">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Approve</span>
                                            </a>
                                        @endif
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
@section('scripts')
    <script>
        window.csrf_token = "{{csrf_token()}}";
    </script>
    <script src="{{ asset('js/customer.js') }}"></script>
@endsection
