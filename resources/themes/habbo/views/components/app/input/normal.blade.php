@props(['type' => 'text', 'value' => '', 'name', 'id', 'placeholder' => '', 'value' => '', 'required' => false, 'error' => false])

<input 
    class="w-full text-[#444] leading-[1.2] bg-[#ccd8df] focus:bg-[#fff] border-[3px] border-[#275d8e] focus:border-[#0074a6] shadow-[inset_0_2px_0_0_#9ebecc] rounded outline-none p-[5px_12px]" 
    @style(['border-color: #903352!important' => $error]) 
    type="{{ $type }}" 
    value="{{ $value }}" 
    name="{{ $name }}" 
    id="{{ $id }}" 
    placeholder="{{ $placeholder }}" 
    value="{{ $value }}" 
    @required($required) 
    maxlength="128"
/>