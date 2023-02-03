@vite('resources/css/app.css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BestelPagina</title>
</head>
<body>
  <div class="container mx-auto p-4">
    <table class="table-auto w-full">
      <thead>
          <tr class="bg-gray-800 text-white">
              <th class="px-4 py-2">Naam</th>
              <th class="px-4 py-2">Beschrijving</th>
              <th class="px-4 py-2">Foto</th>
              <th class="px-4 py-2">Prijs</th>
          </tr>
      </thead>  
      <tbody>
          @foreach ($products as $product)
              <tr class="bg-gray-200">
                  <td class="border px-4 py-2">{{ $product->name }}</td>
                  <td class="border px-4 py-2">{{ $product->description }}</td>
                  <td class="border px-4 py-2">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                  </td>   
                  <td class="border px-4 py-2">{{ $product->price }}</td>
              </tr>
          @endforeach
      </tbody>
    </table>
  </div>

</body>
</html>