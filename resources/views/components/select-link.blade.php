@props(['id', 'name', 'label', 'value', 'options'=>[],])
     
     <div class="mb-4">
            @if($label)
            <label class="block text-gray-700" for="id">
                {{ $label }}
            </label>
            @endif
            <select id="{{ $id }}" name="{{$name}}"
            class="w-full px-4 py-2 border rounded
            focus:outline-none">
            @foreach($options as $optionvalue => $optionlabel)
              <option value="{{ $optionvalue }}" 
              {{ old($name, $value) == $optionvalue ? 'selected' : '' }}>
              {{ $optionlabel }}
               </option>
            @endforeach
        </select>

        </div>