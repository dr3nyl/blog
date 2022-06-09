<x-layout>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<style>
@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
/**
 * tailwind.config.js
 * module.exports = {
 *   variants: {
 *     extend: {
 *       backgroundColor: ['active'],
 *     }
 *   },
 * }
 */
.active\:bg-gray-50:active {
    --tw-bg-opacity:1;
    background-color: rgba(249,250,251,var(--tw-bg-opacity));
}
</style>

        <form action="" method="post">

            <div class="border border-gray-200 overflow-hidden rounded-md" x-data="app()" x-init="init($refs.wysiwyg)">
                <div class="w-full flex border-b border-gray-200 text-xl text-gray-600">
                    <button type="button" class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('bold')">
                        <i class="mdi mdi-format-bold"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('italic')">
                        <i class="mdi mdi-format-italic"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('underline')">
                        <i class="mdi mdi-format-underline"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','P')">
                        <i class="mdi mdi-format-paragraph"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H1')">
                        <i class="mdi mdi-format-header-1"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H2')">
                        <i class="mdi mdi-format-header-2"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H3')">
                        <i class="mdi mdi-format-header-3"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('insertUnorderedList')">
                        <i class="mdi mdi-format-list-bulleted"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('insertOrderedList')">
                        <i class="mdi mdi-format-list-numbered"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyLeft')">
                        <i class="mdi mdi-format-align-left"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyCenter')">
                        <i class="mdi mdi-format-align-center"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyRight')">
                        <i class="mdi mdi-format-align-right"></i>
                    </button>
                </div>
                <div class="w-full">
                    <iframe x-ref="wysiwyg" class="w-full h-96 overflow-y-auto"></iframe>
                </div>
            </div>
        </form>


<script>
function app() {
    return {
        wysiwyg: null,
        init: function(el) {
            // Get el
            this.wysiwyg = el;
            // Add CSS
            this.wysiwyg.contentDocument.querySelector('head').innerHTML += `<style>
            *, ::after, ::before {box-sizing: border-box;}
            :root {tab-size: 4;}
            html {line-height: 1.15;text-size-adjust: 100%;}
            body {margin: 0px; padding: 1rem 0.5rem;}
            body {font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";}
            </style>`;
            this.wysiwyg.contentDocument.body.innerHTML += `
            <h1>Hello World!</h1>
            <p>Welcome to the pure AlpineJS and Tailwind WYSIWYG.</p>
            `;
            // Make editable
            this.wysiwyg.contentDocument.designMode = "on";
        },
        format: function(cmd, param) {
            this.wysiwyg.contentDocument.execCommand(cmd, !1, param||null)
        }
    }
}
</script>

<!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->
<div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
    <div>
        <a title="Buy me a beer" href="https://www.buymeacoffee.com/scottwindon" target="_blank" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
            <img class="object-cover object-center w-full h-full rounded-full" src="https://i.pinimg.com/originals/60/fd/e8/60fde811b6be57094e0abc69d9c2622a.jpg"/>
        </a>
    </div>
</div>

</x-layout>