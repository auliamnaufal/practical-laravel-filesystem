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
                <form method="POST" action="{{ route('uploads.store') }}"
                      class="w-2/3 flex justify-center items-center flex-col" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                               class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="file"/>
                        </label>
                    </div>

                    <div class="text-left w-full mt-4">
                        <label for="helper-text" class="block mb-2 text-sm font-medium text-gray-900">File Name (optional)</label>
                        <input type="text" id="helper-text" aria-describedby="helper-text-explanation" name="filename"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Type here...">
                    </div>

                    <label class="w-full relative inline-flex items-start cursor-pointer mt-4">
                        <input type="checkbox" name="is_public" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Set Public</span>
                    </label>


                    <button type="submit" class="mt-8 px-8 py-2 bg-gray-600 text-white rounded-lg">Upload</button>
                </form>
            </div>

            <div class="h-full col-start-2 col-span-2 grid grid-cols-3 gap-4 rounded-lg overflow-auto">
                @foreach($files as $file)
                    <img src="{{ asset($file) }}" alt="images" class="w-full h-80 rounded-lg object-cover">
                @endforeach
            </div>

        </div>
    </div>

</main>

</body>
</html>
