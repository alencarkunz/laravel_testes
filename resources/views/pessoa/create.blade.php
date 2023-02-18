<x-layout>
  <x-slot:title>Pessoas</x-slot>
  
  <x-pessoa.form :action="route('pessoa.store')" :update="false" />
  
</x-layout>