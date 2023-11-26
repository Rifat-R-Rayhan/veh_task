<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VEH TASK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif

    <div style="display: flex;" class="mt-5">
        <button type="button" class="btn btn-success" style="margin-left: 60px;"><a href="{{route('employee.index')}}" style="color: black">Go Employee Table</a></button>
        <h3 style="margin-left: 360px;">Company List</h3>
        <button type="button" class="btn btn-primary" style="margin-left: 450px;"><a href="{{route('company.create')}}" style="color: black">Add Company</a></button>
    </div>

    <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <th scope="row">{{$company->id}}</th>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->phone}}</td>

                <td style="display: flex;"> 
                    <a href="{{route('company.show', $company->id)}}" class="btn btn-info">
                        Show
                    </a>
                    <a href="{{route('company.edit', $company->id)}}" class="btn btn-success" style="margin-left: 10px;">
                        Update
                    </a>

                    <form action="{{route('company.destroy', $company->id)}}" method="post"  style="margin-left: 10px;">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    {{$companies->links()}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
