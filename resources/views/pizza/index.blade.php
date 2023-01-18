@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>    
    <div class="bg-gray-200 py-8 px-4">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-medium text-gray-800">Track and Trace</h1>
            <form class="relative">
            
            </form>
        </div>
        <div class="overflow-x-auto mt-4">
            <table class="w-full text-left table-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-4 px-6">Order ID</th>
                        <th class="py-4 px-6">Name</th>
                        <th class="py-4 px-6">Pizza</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Delivery date</th>
                    </tr>
                </thead>
                <tbody>
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
                        <td class="py-4 px-6">{{ $order->delivery_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>