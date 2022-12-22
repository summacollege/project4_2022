Project 4 2022-2023
Summa college (leerjaar 2)

Dit project mag/kun je gebruiken als startpunt.
Het bestaat uit:
- laravel
- breeze
- package: Laravel-permission (for roles and permissions)
- wat code

Werkwijze:
- maak voor iedere persoon in de applicatie een user aan en geef die een rol
- de rollen en permissions zijn al aangemaakt in de database seeder:'balie', 'bereiding, 'bezorger', 'klant', 'management'
  - $user = User::create['' => '']
  - $user->assignRole('bereiding');
- voor elke rol is momenteel één permission. Maar dit kan worden uitgebreid.
- gebruik in een view bijvoorbeeld:
  - @can('betsellen') (dit mag een klant)  @endcan
- klanten kunnen via een registratie systeem zichzelf als user aanmaken (achter de schermen word ook meteen een person record aangemaakt)
  - wanner ze een aankoop gaan doen kunnen ze extra informatie invullen (of je zou de profile pagina kunnen uitbreiden)
- bij het aanmaken moet je wel een juiste rol 'assignen' (dit is al in de code gebeurt)
- werkwijze voor personeel:
  - melden zich eerst aan via register
  - management zoekt daarna user en verandert de rol
  - personeel moet daarna extra info invullen

- dus er moet een start account zijn:admin (zie seeder)
- hiermee kun je management maken en management kan de rest maken


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
