<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-dark text-white">

    <div class="container">
        <h1 class="text-center mt-4 mb-5 display-4">Todo List</h1>
        <div class="row justify-content-center">
            <div class="col-sm col-md-8 col-lg-3">

                {{-- Looping Item --}}
                @foreach ($listItems as $item)
                    <div class="d-flex align-items-center my-2">

                        {{-- Tampilkan item. Jika sudah selesai, text lebih redup --}}
                        <p class="m-0 {{ $item->is_complete === 1 ? 'text-white-50' : ' ' }}">Item :
                            {{ $item->name }}
                        </p>

                        {{-- Jika belum selesai, tampilkan centang --}}
                        @if ($item->is_complete === 0)
                            <form class="ms-auto" action="{{ route('markComplete', $item->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-light p-1">✔</button>
                            </form>

                            {{-- Jika sudah selesai, tampilkan silang untuk menghapus --}}
                        @else
                            <form class="ms-auto" action="{{ route('deleteItem', $item->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-light p-1">❌</button>
                            </form>
                        @endif
                    </div>
                @endforeach

                <form class="mt-5" action="{{ route('saveItem') }}" method="post">
                    @csrf

                    <label class="form-label" for="listItem">New Todo Item</label>
                    <input class="form-control mb-2" type="text" name="listItem" placeholder="What Are You Gonna Do?"
                        autofocus>
                    <button class="btn btn-primary w-100" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
