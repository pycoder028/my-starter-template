<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities{
            .container{
                @apply px-10 py-3 mx-auto;
            }
        }
    </style>
    <title>Laravel CRUD</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between">
            <h2 class="text-red-500 text-xl">Edit</h2>

            <a href="{{ url('/')}}" class="bg-green-600 text-white rounded py-2 px-4">Back</a>
        </div>

        <div>
            <form action="{{ route('update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5 py-2">
                    <input type="text" name="name" placeholder="Name" value="{{ $post->name }}">
                    @error('name')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <input type="text" name="description" placeholder="Description" value="{{ $post->description }}">
                    @error('description')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <input type="file" name="image" id="">
                    @error('image')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <div>
                        <input type="submit" value="Update" class="bg-green-500 text-white py-2 px-4 rounded inline-block">
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>
</html>