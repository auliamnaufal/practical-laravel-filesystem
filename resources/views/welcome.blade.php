<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased box-border">

        <main>

            <div class="h-screen max-h-screen max-w-screen-3xl mx-auto p-8">
                <div class="w-full h-full bg-gray-200 p-4 rounded-lg grid grid-cols-3 gap-4">

                    <div class="h-full col-end-2 bg-gray-300 rounded-lg flex justify-center items-center">
                        <form method="POST" action="{{ route('uploads.store') }}" class="flex justify-center items-center flex-col" enctype="multipart/form-data">
                            @csrf
                            <label>
                                <span class="sr-only">Choose File</span>
                                <input type="file" name="file" class="block w-fit text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-600 hover:file:bg-blue-100"/>
                            </label>
                            <button type="submit" class="mt-8 px-8 py-2 bg-gray-600 text-white rounded-lg">Upload</button>
                        </form>
                    </div>

                    <div class="h-full col-start-2 col-span-2 rounded-lg"></div>

                </div>
            </div>

        </main>

    </body>
</html>
