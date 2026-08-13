<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* th,
        td {
            text-align: center;
        } */
    </style>
</head>

<body>

    <!-- nav -->
    {{-- <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../student/index.html">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../teacher/index.html">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Link</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
            </div>
        </div>
    </nav> --}}
    <!-- nav end -->

    <!-- msg -->
    <!-- <div class="container mt-3 msg-box" >
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> <span>新增成功</span>.
        </div>
    </div> -->
    <!-- msg end -->

    <div class="container mt-3 ">
        <h2>Cat Table Index</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('cats.create') }}">新增</a>
        </div>
        <table class="table table-bordered mt-5">
            @php
                // dd($data);
            @endphp
            <thead>
                <tr>
                    <th class="text-center" width="10%">id</th>
                    <th class="text-center" width="10%">name</th>
                    <th>opt</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                    <tr>
                        <td class="text-center">{{ $value->id }}</td>
                        <td class="text-center">{{ $value->name }}</td>
                        <td>
                            <form action="{{ route('cats.destroy', ['cat' => $value->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{ route('cats.edit', ['cat' => $value->id]) }}">修改</a> &nbsp;&nbsp;
                                <button class="btn btn-danger" type="submit">刪除</button>
                            </form>
                            {{-- <a href="./del.html?id=1">刪除123</a> --}}
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

</body>

</html>
