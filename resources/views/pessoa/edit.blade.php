<x-layout>
  <x-slot:title>Pessoas</x-slot>
  
  <x-pessoa.form :action="route('pessoa.update', $pessoa->pes_id)" :pessoa="$pessoa" :update="true" />
  
</x-layout>