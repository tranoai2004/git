<!DOCTYPE html>
<html>
<head>
    <title>Thư viện sách</title>
</head>
<body>
    <h1>Danh sách sách</h1>
    <ul>
        @foreach ($books as $book)
            <li>
                <h2>{{ $book->title }}</h2>
                <p>{{ $book->description }}</p>
                <p>Tác giả: {{ $book->author->name }}</p>
                <p>Thể loại:
                    @foreach ($book->categories as $category)
                        {{ $category->name }}
                    @endforeach
                </p>
            </li>
        @endforeach
    </ul>
</body>
</html>
