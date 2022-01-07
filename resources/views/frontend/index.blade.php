<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="#" class="flex">
                    <button type="button" class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
                        <svg class="w-6 h-6 dark:text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        Home Page absen siswa
                      </button>
            </a>
            <div class="flex md:order-2">
                <button data-collapse-toggle="mobile-menu-4" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-4" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div class="flex flex-col py-10 px-40">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 dark:bg-yellow-700">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-sm font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-100">
                                    #
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-sm font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-100">
                                    Mata Pelajaran
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-sm font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-100">
                                    Kelas
                                </th>
                                <th scope="col"
                                class="relative py-3 px-6 text-sm font-medium tracking-wider text-right text-gray-700 uppercase dark:text-gray-100">
                                Action
                            </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-100">
                                <td
                                    class="py-4 px-6 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </td>
                                <td
                                class="py-4 px-6 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </td>
                                <td class="py-4 px-6 text-xs text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    Sliver
                                </td>
                                <td class="py-4 px-6 text-xs font-medium text-right whitespace-nowrap">
                                    <button type="button"
                                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Show</button>
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-100">
                                <td
                                class="py-4 px-6 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                2
                            </td>
                                <td
                                    class="py-4 px-6 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple Imac 27"
                                </td>
                                <td class="py-4 px-6 text-xs text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    White
                                </td>

                                <td class="py-4 px-6 text-xs font-medium text-right whitespace-nowrap">
                                    <button type="button"
                                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Show</button>
                                </td>
                            </tr>

                            <tr class="bg-white dark:bg-gray-800">
                                <td
                                class="py-4 px-6 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                3
                            </td>
                                <td
                                    class="py-4 px-6 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple Magic Mouse 2
                                </td>
                                <td class="py-4 px-6 text-xs text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    White
                                </td>

                                <td class="py-4 px-6 text-xs font-medium text-right whitespace-nowrap">
                                    <button type="button"
                                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Show</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
