<x-app-layout>
    @push('title', __('Generator'))

    <div class="col-span-12">
        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                Logo generator
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Generate your very own logo') }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200">
                <div x-data="logoGenerator()" class="mt-4">
                    <label for="text" class="font-bold"> {{ __('Logo text') }} </label>
                    <input x-model="text" class="mt-2 focus:ring-0 border-4 border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:border-[#eeb425] w-full" id="text" type="text" name="text" placeholder="Type here...">
                    <div id="logoContainer" class="flex mt-4" :class="text !== '' ? 'mb-4' : ''" style="gap: 2px;" x-html="generateLogoHtml"></div>
                    <div class="flex gap-4 justify-between">
                        <button @click="generateCanvas('download')" class="w-full rounded bg-[#eeb425] text-white p-2 border-2 border-yellow-400 transition ease-in-out duration-200 hover:bg-[#d49f1c] font-semibold"> {{ __('Download logo') }} </button>
                        <button @click="generateCanvas('use')" class="w-full rounded bg-green-600 hover:bg-green-700 text-white p-2 border-2 border-green-500 transition ease-in-out duration-150 font-semibold"> {{ __('Use logo') }} </button>
                    </div>
                </div>
            </div>
        </x-content.content-card>
    </div>

    {{-- TODO: Selfhost --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>
    <script>
        function logoGenerator() {
            return {
                text: '',
                get generateLogoHtml() {
                    let sanitizedText = this.text.toLowerCase().replace(/[^a-z ]/g, '');
                    let html = '';
                    for (let i = 0; i < sanitizedText.length; i++) {
                        let letter = sanitizedText[i];
                        html += (letter === ' ') ? '<div style="width: 15px;"></div>' : `<img src="/assets/images/logo-generator/atom/${letter}.png" alt="${letter}">`;
                    }
                    return html;
                },

                async generateCanvas(action) {
                    const logoContainer = document.querySelector('#logoContainer');
                    const originalStyles = logoContainer.getAttribute('style');

                    let combinedWidth = 0;
                    let maxHeight = 0;

                    logoContainer.childNodes.forEach(child => {
                        const rect = child.getBoundingClientRect();
                        combinedWidth += rect.width;
                        if (rect.height > maxHeight) {
                            maxHeight = rect.height;
                        }
                    });

                    combinedWidth += (logoContainer.childNodes.length - 1) * 2;
                    logoContainer.style.display = 'flex';

                    setTimeout(async () => {
                        const canvas = await html2canvas(logoContainer, {
                            backgroundColor: null,
                            width: combinedWidth,
                            height: maxHeight
                        });

                        logoContainer.setAttribute('style', originalStyles);

                        if (action === 'use') {
                            this.uploadLogo(canvas);
                        } else {
                            this.downloadCanvasAsImage(canvas);
                        }
                    }, 100);
                },

                async uploadLogo(canvas) {
                    canvas.toBlob(async (blob) => {
                        const formData = new FormData();
                        const sanitizedFileName = `${this.text.replace(/[^a-zA-Z0-9]/g, '_')}_${Date.now()}.png`;
                        formData.append('logo', blob, sanitizedFileName);

                        await fetch('{{ route('store.generated-logo') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            body: formData
                        }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    })

                                    setTimeout(() => {
                                        window.location.href = "{{ url()->current() }}";
                                    }, 1000);
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Something went wrong'
                                    })
                                }
                            });
                    }, 'image/png');
                },

                async downloadCanvasAsImage(canvas) {
                    const a = document.createElement('a');
                    const sanitizedFileName = this.text.replace(/[^a-zA-Z0-9]/g, '_');
                    a.href = canvas.toDataURL("image/png", 1.0);
                    a.download = `${sanitizedFileName}.png`;
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }
            };
        }
    </script>
</x-app-layout>


