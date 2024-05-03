@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' =>
                                                                  'border-black text-black bg-orange-100
                                                                   focus:border-orange-700 focus:ring-orange-400
                                                                   rounded-md shadow-sm']) !!}>