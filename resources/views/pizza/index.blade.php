    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Track And Trace</title>
    </head>
    <body>    
        
        <div class="bg-gray-200 py-8 px-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-medium text-gray-800">Track and Trace</h1>
                <form class="relative">
                
                </form>
            </div>
            @if(Auth::check() && Auth::user()->name == 'admin')
            <a href="home">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> Home</button>
              </a>
              
            <div class="overflow-x-auto mt-4">
                <table class="w-full text-left table-collapse">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-4 px-6">Order id</th>
                            <th class="py-4 px-6">Name</th>
                            <th class="py-4 px-6">Pizza</th>    
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6">Adress</th>
                            <th class="py-4 px-6">Verwijderen</th>
                        </tr>
                    </thead>
                        @foreach($orders as $order)
                        <tr>
                            <td class="py-4 px-6">{{ $order->id }}</td>
                            <td class="py-4 px-6">{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td class="py-4 px-6">{{ $order->pizza }}</td>
                            <td class="py-4 px-6">
                                @if ($order->status == 'pending')
                                    <span class="bg-yellow-500 text-xs rounded-full px-3 py-1 text-white">Pending</span>
                                @elseif ($order->status == 'in_progress')
                                    <span class="bg-blue-500 text-xs rounded-full px-3 py-1 text-white">In Progress</span>
                                @else
                                    <span class="bg-green-500 text-xs rounded-full px-3 py-1 text-white">Delivered</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">{{ $order->adress }}</td>
                            <td>
                                <form action="{{ route('pizza.destroy', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Verwijderen</button>
                                </form> 
                        @endforeach
                        
                    @else
                </tr>
                <a href="home">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> Home</button>
                  </a>
            </thead>
            <tbody>
                <div class="overflow-x-auto mt-4">
                    <table class="w-full text-left table-collapse">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-4 px-6">Name</th>
                                <th class="py-4 px-6">Pizza</th>    
                                <th class="py-4 px-6">Status</th>
                                <th class="py-4 px-6">Adress</th>
                                <th class="py-4 px-6">Verwijderen</th>
                            </tr>
                        </thead>

                        @foreach($orders as $order)
                        <tr>
                            <td class="py-4 px-6">{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td class="py-4 px-6">{{ $order->pizza }}</td>
                            <td class="py-4 px-6">
                                @if ($order->status == '    pending')
                                    <span class="bg-yellow-500 text-xs rounded-full px-3 py-1 text-white">Pending</span>
                                @elseif ($order->status == 'in_progress')
                                    <span class="bg-blue-500 text-xs rounded-full px-3 py-1 text-white">In Progress</span>
                                @else
                                    <span class="bg-green-500 text-xs rounded-full px-3 py-1 text-white">Delivered</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">{{ $order->adress }}</td>
                            <td>
                                <form action="{{ route('pizza.destroy', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Verwijderen</button>
                                    
                                </form>
                            </td>
                        @endforeach 
                    @endif
                                    
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>