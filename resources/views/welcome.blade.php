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
            .btn{
                @apply bg-green-600 text-white rounded py-2 px-4;
            }
        }
    </style>
    <title>Laravel CRUD</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between">
            <h2 class="text-red-500 text-xl">Home</h2>

            <a href="{{ url('/create')}}" class="btn">Add New Post</a>
        </div>
        @if (session('success'))
            <h2 class="text-green-500">{{ session('success') }}</h2>
        @endif
        {{-- showing data --}}
        <div class="">

            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                  <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                      <table class="min-w-full divide-y divide-gray-200 my-5">
                        <thead>
                          <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">ID</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">DESCRIPTION</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">IMAGE</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $row)
                            <tr class="odd:bg-white even:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $row->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $row->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $row->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><img src="images/{{ $row->image }}" width="80px" alt=""></td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                  <a class="btn" href="{{ route('edit', $row->id) }}">Edit</a>
                                  <a class="bg-red-600 text-white rounded py-2 px-4" href="{{ route('delete', $row->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $posts->links() }}
                    </div>
                  </div>
                </div>
              </div>

        </div>

    </div>
</body>
</html>