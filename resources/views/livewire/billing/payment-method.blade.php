<div>
    <!-- Payment info -->
@if($hasPaymentMethod)
<section class="bg-white shadow sm:rounded-lg" x-data="{ editing: false }">
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Payment Methods</h3>
        <div class="mt-5">
            <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                <div class="sm:flex sm:items-start">
                    @if($paymentMethod['card']['brand'] === 'visa')
                        <svg class="h-8 w-auto sm:h-6 sm:flex-shrink-0" viewBox="0 0 36 24" aria-hidden="true">
                            <rect width="36" height="24" fill="#224DBA" rx="4" />
                            <path fill="#fff" d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z" />
                        </svg>
                    @elseif($paymentMethod['card']['brand'] === 'mastercard')
                        <svg class="h-8 w-auto sm:h-6 sm:flex-shrink-0" enable-background="new 0 0 780 500" viewBox="0 0 780 500"><path d="m40 0h700c22.092 0 40 17.909 40 40v420c0 22.092-17.908 40-40 40h-700c-22.091 0-40-17.908-40-40v-420c0-22.091 17.909-40 40-40z" fill="#16366f"/><path d="m449.01 250c0 99.143-80.37 179.5-179.51 179.5s-179.5-80.361-179.5-179.5c0-99.133 80.362-179.5 179.5-179.5 99.137 0 179.51 80.37 179.51 179.5" fill="#d9222a"/><path d="m510.49 70.496c-46.38 0-88.643 17.596-120.5 46.466-6.49 5.889-12.548 12.237-18.125 18.996h36.266c4.966 6.037 9.536 12.388 13.685 19.013h-63.635c-3.827 6.121-7.28 12.469-10.341 19.008h84.312c2.893 6.185 5.431 12.53 7.6 19.004h-99.512c-2.091 6.235-3.832 12.581-5.217 19.009h109.94c2.689 12.49 4.044 25.231 4.041 38.008 0 19.934-3.254 39.113-9.254 57.02h-99.512c2.164 6.479 4.7 12.825 7.595 19.01h84.317c-3.064 6.54-6.52 12.889-10.347 19.013h-63.625c4.154 6.629 8.73 12.979 13.685 18.996h36.258c-5.57 6.772-11.63 13.126-18.13 19.012 31.86 28.867 74.118 46.454 120.5 46.454 99.138-.001 179.51-80.362 179.51-179.5 0-99.13-80.37-179.5-179.51-179.5" fill="#ee9f2d"/><path d="m666.08 350.06c0-3.201 2.592-5.801 5.796-5.801s5.796 2.6 5.796 5.801c0 3.199-2.592 5.799-5.796 5.799-3.202-.001-5.797-2.598-5.796-5.799zm5.796 4.408c2.435-.001 4.407-1.975 4.408-4.408 0-2.433-1.972-4.404-4.404-4.404h-.004c-2.429-.004-4.4 1.963-4.404 4.392v.013c-.003 2.432 1.967 4.406 4.399 4.408.001-.001.003-.001.005-.001zm-.783-1.86h-1.188v-5.094h2.149c.45 0 .908 0 1.305.254.413.278.646.77.646 1.278 0 .57-.337 1.104-.883 1.312l.937 2.25h-1.315l-.78-2.016h-.87v2.016zm0-2.89h.658c.246 0 .504.02.725-.1.196-.125.296-.359.296-.584 0-.195-.12-.42-.288-.516-.207-.131-.536-.101-.758-.101h-.633zm-443.5-80.063c-2.045-.237-2.945-.301-4.35-.301-11.045 0-16.637 3.789-16.637 11.268 0 4.611 2.73 7.546 6.987 7.546 7.938 0 13.659-7.56 14-18.513zm14.171 32.996h-16.146l.371-7.676c-4.925 6.067-11.496 8.95-20.425 8.95-10.562 0-17.804-8.25-17.804-20.229 0-18.024 12.596-28.54 34.217-28.54 2.208 0 5.041.2 7.941.569.605-2.441.763-3.486.763-4.8 0-4.908-3.396-6.738-12.5-6.738-9.533-.108-17.396 2.271-20.625 3.334.204-1.23 2.7-16.658 2.7-16.658 9.712-2.846 16.117-3.917 23.325-3.917 16.733 0 25.596 7.512 25.58 21.712.032 3.805-.597 8.5-1.58 14.671-1.692 10.731-5.32 33.718-5.817 39.322zm-62.158 0h-19.488l11.163-69.997-24.925 69.997h-13.28l-1.64-69.597-11.734 69.597h-18.242l15.238-91.054h28.02l1.7 50.966 17.092-50.966h31.167zm354.98-32.996c-2.037-.237-2.942-.301-4.342-.301-11.041 0-16.634 3.789-16.634 11.268 0 4.611 2.726 7.546 6.983 7.546 7.939 0 13.664-7.56 13.993-18.513zm14.183 32.996h-16.145l.365-7.676c-4.925 6.067-11.5 8.95-20.42 8.95-10.566 0-17.8-8.25-17.8-20.229 0-18.024 12.587-28.54 34.212-28.54 2.208 0 5.037.2 7.934.569.604-2.441.763-3.486.763-4.8 0-4.908-3.392-6.738-12.496-6.738-9.533-.108-17.388 2.271-20.63 3.334.205-1.23 2.709-16.658 2.709-16.658 9.713-2.846 16.113-3.917 23.312-3.917 16.741 0 25.604 7.512 25.588 21.712.032 3.805-.597 8.5-1.58 14.671-1.682 10.731-5.32 33.718-5.812 39.322zm-220.39-1.125c-5.334 1.68-9.492 2.399-14 2.399-9.963 0-15.4-5.725-15.4-16.267-.142-3.27 1.433-11.879 2.67-19.737 1.125-6.917 8.45-50.53 8.45-50.53h19.371l-2.262 11.209h11.7l-2.643 17.796h-11.742c-2.25 14.083-5.454 31.625-5.491 33.95 0 3.817 2.037 5.483 6.67 5.483 2.221 0 3.941-.226 5.255-.7zm59.391-.6c-6.654 2.033-13.075 3.017-19.879 3-21.683-.021-32.987-11.346-32.987-33.032 0-25.313 14.38-43.947 33.9-43.947 15.97 0 26.17 10.433 26.17 26.796 0 5.429-.7 10.729-2.387 18.212h-38.575c-1.304 10.742 5.57 15.217 16.837 15.217 6.935 0 13.188-1.43 20.142-4.663zm-10.887-43.9c.107-1.543 2.054-13.217-9.013-13.217-6.171 0-10.583 4.704-12.38 13.217zm-123.42-5.017c0 9.367 4.541 15.825 14.841 20.676 7.892 3.709 9.113 4.809 9.113 8.17 0 4.617-3.48 6.7-11.192 6.7-5.812 0-11.22-.907-17.458-2.92 0 0-2.563 16.32-2.68 17.101 4.43.966 8.38 1.861 20.28 2.19 20.562 0 30.058-7.829 30.058-24.75 0-10.175-3.975-16.146-13.737-20.633-8.171-3.75-9.109-4.588-9.109-8.046 0-4.004 3.238-6.046 9.538-6.046 3.825 0 9.05.408 14 1.113l2.775-17.175c-5.046-.8-12.696-1.442-17.15-1.442-21.8 0-29.346 11.387-29.279 25.062m229.09-23.116c5.413 0 10.459 1.42 17.413 4.92l3.187-19.762c-2.854-1.12-12.904-7.7-21.416-7.7-13.042 0-24.066 6.47-31.82 17.15-11.31-3.746-15.959 3.825-21.659 11.367l-5.062 1.179c.383-2.483.73-4.95.613-7.446h-17.896c-2.445 22.917-6.779 46.13-10.171 69.075l-.884 4.976h19.496c3.254-21.143 5.038-34.681 6.121-43.842l7.342-4.084c1.096-4.08 4.529-5.458 11.416-5.292-.926 5.008-1.389 10.09-1.383 15.184 0 24.225 13.071 39.308 34.05 39.308 5.404 0 10.042-.712 17.221-2.657l3.431-20.76c-6.46 3.18-11.761 4.676-16.561 4.676-11.328 0-18.183-8.362-18.183-22.184-.001-20.05 10.195-34.108 24.745-34.108"/><path d="m185.21 297.24h-19.491l11.17-69.988-24.925 69.988h-13.282l-1.642-69.588-11.733 69.588h-18.243l15.238-91.042h28.02l.788 56.362 18.904-56.362h30.267z" fill="#fff"/><path d="m647.52 211.6-4.319 26.308c-5.33-7.012-11.054-12.087-18.612-12.087-9.834 0-18.784 7.454-24.642 18.425-8.158-1.692-16.597-4.563-16.597-4.563l-.004.067c.658-6.133.92-9.875.862-11.146h-17.9c-2.437 22.917-6.77 46.13-10.157 69.075l-.893 4.976h19.492c2.633-17.097 4.65-31.293 6.133-42.551 6.659-6.017 9.992-11.267 16.721-10.917-2.979 7.206-4.725 15.504-4.725 24.017 0 18.513 9.367 30.725 23.534 30.725 7.141 0 12.62-2.462 17.966-8.17l-.912 6.884h18.433l14.842-91.043zm-24.37 73.942c-6.634 0-9.983-4.909-9.983-14.597 0-14.553 6.271-24.875 15.112-24.875 6.695 0 10.32 5.104 10.32 14.508.001 14.681-6.369 24.964-15.449 24.964z"/><path d="m233.19 264.26c-2.042-.236-2.946-.3-4.346-.3-11.046 0-16.634 3.788-16.634 11.267 0 4.604 2.73 7.547 6.98 7.547 7.945-.001 13.666-7.559 14-18.514zm14.179 32.984h-16.146l.367-7.663c-4.921 6.054-11.5 8.95-20.421 8.95-10.567 0-17.804-8.25-17.804-20.229 0-18.032 12.591-28.542 34.216-28.542 2.209 0 5.042.2 7.938.571.604-2.442.762-3.487.762-4.808 0-4.908-3.391-6.73-12.496-6.73-9.537-.108-17.395 2.272-20.629 3.322.204-1.226 2.7-16.638 2.7-16.638 9.709-2.858 16.121-3.93 23.321-3.93 16.738 0 25.604 7.518 25.588 21.705.029 3.82-.605 8.512-1.584 14.675-1.687 10.725-5.32 33.725-5.812 39.317zm261.38-88.592-3.192 19.767c-6.95-3.496-12-4.921-17.407-4.921-14.551 0-24.75 14.058-24.75 34.107 0 13.821 6.857 22.181 18.183 22.181 4.8 0 10.096-1.492 16.554-4.677l-3.42 20.75c-7.184 1.959-11.816 2.672-17.226 2.672-20.976 0-34.05-15.084-34.05-39.309 0-32.55 18.059-55.3 43.888-55.3 8.507.001 18.562 3.609 21.42 4.73m31.442 55.608c-2.041-.236-2.941-.3-4.346-.3-11.042 0-16.634 3.788-16.634 11.267 0 4.604 2.729 7.547 6.984 7.547 7.937-.001 13.662-7.559 13.996-18.514zm14.179 32.984h-16.15l.37-7.663c-4.924 6.054-11.5 8.95-20.42 8.95-10.563 0-17.804-8.25-17.804-20.229 0-18.032 12.595-28.542 34.212-28.542 2.213 0 5.042.2 7.941.571.601-2.442.763-3.487.763-4.808 0-4.908-3.392-6.73-12.496-6.73-9.533-.108-17.396 2.272-20.629 3.322.204-1.226 2.704-16.638 2.704-16.638 9.709-2.858 16.116-3.93 23.316-3.93 16.742 0 25.604 7.518 25.583 21.705.034 3.82-.595 8.512-1.579 14.675-1.682 10.725-5.324 33.725-5.811 39.317zm-220.39-1.122c-5.338 1.68-9.496 2.409-14 2.409-9.963 0-15.4-5.726-15.4-16.266-.138-3.281 1.437-11.881 2.675-19.738 1.12-6.926 8.446-50.533 8.446-50.533h19.367l-2.259 11.212h9.942l-2.646 17.788h-9.975c-2.25 14.091-5.463 31.619-5.496 33.949 0 3.83 2.042 5.483 6.671 5.483 2.22 0 3.938-.217 5.254-.692zm59.392-.591c-6.65 2.033-13.08 3.013-19.88 3-21.684-.021-32.987-11.346-32.987-33.033 0-25.321 14.38-43.95 33.9-43.95 15.97 0 26.17 10.429 26.17 26.8 0 5.433-.7 10.733-2.382 18.212h-38.575c-1.306 10.741 5.569 15.221 16.837 15.221 6.93 0 13.188-1.434 20.137-4.676zm-10.892-43.912c.117-1.538 2.059-13.217-9.013-13.217-6.166 0-10.579 4.717-12.375 13.217zm-123.42-5.004c0 9.365 4.542 15.816 14.842 20.675 7.891 3.708 9.112 4.812 9.112 8.17 0 4.617-3.483 6.7-11.187 6.7-5.817 0-11.225-.908-17.467-2.92 0 0-2.554 16.32-2.67 17.1 4.42.967 8.374 1.85 20.274 2.191 20.567 0 30.059-7.829 30.059-24.746 0-10.18-3.971-16.15-13.738-20.637-8.167-3.758-9.112-4.583-9.112-8.046 0-4 3.245-6.058 9.541-6.058 3.821 0 9.046.42 14.004 1.125l2.771-17.18c-5.041-.8-12.691-1.441-17.146-1.441-21.804 0-29.345 11.379-29.283 25.067m398.45 50.629h-18.437l.917-6.893c-5.347 5.717-10.825 8.18-17.967 8.18-14.168 0-23.53-12.213-23.53-30.725 0-24.63 14.521-45.393 31.709-45.393 7.558 0 13.28 3.088 18.604 10.096l4.325-26.308h19.221zm-28.745-17.109c9.075 0 15.45-10.283 15.45-24.953 0-9.405-3.63-14.509-10.325-14.509-8.838 0-15.116 10.317-15.116 24.875-.001 9.686 3.357 14.587 9.991 14.587zm-56.843-56.929c-2.439 22.917-6.773 46.13-10.162 69.063l-.891 4.975h19.491c6.971-45.275 8.658-54.117 19.588-53.009 1.742-9.266 4.982-17.383 7.399-21.479-8.163-1.7-12.721 2.913-18.688 11.675.471-3.787 1.334-7.466 1.163-11.225zm-160.42 0c-2.446 22.917-6.78 46.13-10.167 69.063l-.887 4.975h19.5c6.962-45.275 8.646-54.117 19.569-53.009 1.75-9.266 4.992-17.383 7.4-21.479-8.154-1.7-12.716 2.913-18.678 11.675.47-3.787 1.325-7.466 1.162-11.225zm254.57 68.242c0-3.214 2.596-5.8 5.796-5.8 3.197-.003 5.792 2.587 5.795 5.785v.015c-.001 3.2-2.595 5.794-5.795 5.796-3.2-.002-5.794-2.596-5.796-5.796zm5.796 4.404c2.432.001 4.403-1.97 4.403-4.401v-.002c.003-2.433-1.968-4.406-4.399-4.408h-.004c-2.435.001-4.408 1.974-4.409 4.408.003 2.432 1.976 4.403 4.409 4.403zm-.784-1.87h-1.188v-5.084h2.154c.446 0 .908.008 1.296.254.416.283.654.767.654 1.274 0 .575-.338 1.113-.888 1.317l.941 2.236h-1.319l-.78-2.008h-.87v2.008zm0-2.88h.654c.245 0 .513.018.729-.1.195-.125.295-.361.295-.587-.009-.21-.115-.404-.287-.524-.204-.117-.542-.085-.763-.085h-.629v1.296z" fill="#fff"/></svg>
                    @elseif($paymentMethod['card']['brand'] === 'american express')
                        <svg class="h-8 w-auto sm:h-6 sm:flex-shrink-0" enable-background="new 0 0 780 500" viewBox="0 0 780 500"><path d="m40 .001h700c22.092 0 40 17.909 40 40v420c0 22.092-17.908 40-40 40h-700c-22.091 0-40-17.908-40-40v-420c0-22.091 17.909-40 40-40z" fill="#2557d6"/><path d="m.253 235.69h37.441l8.442-19.51h18.9l8.42 19.51h73.668v-14.915l6.576 14.98h38.243l6.576-15.202v15.138h183.08l-.085-32.026h3.542c2.479.083 3.204.302 3.204 4.226v27.8h94.689v-7.455c7.639 3.92 19.518 7.455 35.148 7.455h39.836l8.525-19.51h18.9l8.337 19.51h76.765v-18.532l11.626 18.532h61.515v-122.51h-60.88v14.468l-8.522-14.468h-62.471v14.468l-7.828-14.468h-84.38c-14.123 0-26.539 1.889-36.569 7.153v-7.153h-58.229v7.153c-6.383-5.426-15.079-7.153-24.75-7.153h-212.74l-14.274 31.641-14.659-31.641h-67.005v14.468l-7.362-14.468h-57.145l-26.539 58.246v64.261h.003zm236.34-17.67h-22.464l-.083-68.794-31.775 68.793h-19.24l-31.858-68.854v68.854h-44.57l-8.42-19.592h-45.627l-8.505 19.592h-23.801l39.241-87.837h32.559l37.269 83.164v-83.164h35.766l28.678 59.587 26.344-59.587h36.485zm-165.9-37.823-14.998-35.017-14.915 35.017zm255.3 37.821h-73.203v-87.837h73.203v18.291h-51.289v15.833h50.06v18.005h-50.061v17.542h51.289zm103.16-64.18c0 14.004-9.755 21.24-15.439 23.412 4.794 1.748 8.891 4.838 10.84 7.397 3.094 4.369 3.628 8.271 3.628 16.116v17.255h-22.104l-.083-11.077c0-5.285.528-12.886-3.458-17.112-3.202-3.09-8.083-3.76-15.973-3.76h-23.523v31.95h-21.914v-87.838h50.401c11.199 0 19.451.283 26.535 4.207 6.933 3.924 11.09 9.652 11.09 19.45zm-27.699 13.042c-3.013 1.752-6.573 1.81-10.841 1.81h-26.62v-19.51h26.982c3.818 0 7.804.164 10.393 1.584 2.842 1.28 4.601 4.003 4.601 7.765 0 3.84-1.674 6.929-4.515 8.351zm62.844 51.138h-22.358v-87.837h22.358zm259.56 0h-31.053l-41.535-65.927v65.927h-44.628l-8.527-19.592h-45.521l-8.271 19.592h-25.648c-10.649 0-24.138-2.257-31.773-9.715-7.701-7.458-11.708-17.56-11.708-33.533 0-13.027 2.395-24.936 11.812-34.347 7.085-7.01 18.18-10.242 33.28-10.242h21.215v18.821h-20.771c-7.997 0-12.514 1.14-16.862 5.203-3.735 3.699-6.298 10.69-6.298 19.897 0 9.41 1.951 16.196 6.023 20.628 3.373 3.476 9.506 4.53 15.272 4.53h9.842l30.884-69.076h32.835l37.102 83.081v-83.08h33.366l38.519 61.174v-61.174h22.445zm-133.2-37.82-15.165-35.017-15.081 35.017zm189.04 178.08c-5.322 7.457-15.694 11.238-29.736 11.238h-42.319v-18.84h42.147c4.181 0 7.106-.527 8.868-2.175 1.665-1.474 2.605-3.554 2.591-5.729 0-2.561-1.064-4.593-2.677-5.811-1.59-1.342-3.904-1.95-7.722-1.95-20.574-.67-46.244.608-46.244-27.194 0-12.742 8.443-26.156 31.439-26.156h43.649v-17.479h-40.557c-12.237 0-21.129 2.81-27.425 7.174v-7.175h-59.985c-9.595 0-20.854 2.279-26.179 7.175v-7.175h-107.12v7.175c-8.524-5.892-22.908-7.175-29.549-7.175h-70.656v7.175c-6.745-6.258-21.742-7.175-30.886-7.175h-79.077l-18.094 18.764-16.949-18.764h-118.13v122.59h115.9l18.646-19.062 17.565 19.062 71.442.061v-28.838h7.021c9.479.14 20.66-.228 30.523-4.312v33.085h58.928v-31.952h2.842c3.628 0 3.985.144 3.985 3.615v28.333h179.01c11.364 0 23.244-2.786 29.824-7.845v7.845h56.78c11.815 0 23.354-1.587 32.134-5.649l.002-22.84zm-354.94-47.155c0 24.406-19.005 29.445-38.159 29.445h-27.343v29.469h-42.591l-26.984-29.086-28.042 29.086h-86.802v-87.859h88.135l26.961 28.799 27.875-28.799h70.021c17.389 0 36.929 4.613 36.929 28.945zm-174.22 40.434h-53.878v-17.48h48.11v-17.926h-48.11v-15.974h54.939l23.969 25.604zm86.81 10.06-33.644-35.789 33.644-34.65zm49.757-39.066h-28.318v-22.374h28.572c7.912 0 13.404 3.09 13.404 10.772 0 7.599-5.238 11.602-13.658 11.602zm148.36-40.373h73.138v18.17h-51.315v15.973h50.062v17.926h-50.062v17.48l51.314.08v18.23h-73.139zm-28.119 47.029c4.878 1.725 8.865 4.816 10.734 7.375 3.095 4.291 3.542 8.294 3.631 16.037v17.418h-22.002v-10.992c0-5.286.531-13.112-3.542-17.198-3.201-3.147-8.083-3.899-16.076-3.899h-23.42v32.09h-22.02v-87.859h50.594c11.093 0 19.173.47 26.366 4.146 6.915 4.004 11.266 9.487 11.266 19.511-.001 14.022-9.764 21.178-15.531 23.371zm-12.385-11.107c-2.932 1.667-6.556 1.811-10.818 1.811h-26.622v-19.732h26.982c3.902 0 7.807.08 10.458 1.587 2.84 1.423 4.538 4.146 4.538 7.903 0 3.758-1.699 6.786-4.538 8.431zm197.82 5.597c4.27 4.229 6.554 9.571 6.554 18.613 0 18.9-12.322 27.723-34.425 27.723h-42.68v-18.84h42.51c4.157 0 7.104-.525 8.95-2.175 1.508-1.358 2.589-3.333 2.589-5.729 0-2.561-1.17-4.592-2.675-5.811-1.675-1.34-3.986-1.949-7.803-1.949-20.493-.67-46.157.609-46.157-27.192 0-12.744 8.355-26.158 31.33-26.158h43.932v18.7h-40.198c-3.984 0-6.575.145-8.779 1.587-2.4 1.422-3.29 3.534-3.29 6.319 0 3.314 2.037 5.57 4.795 6.546 2.311.77 4.795.995 8.526.995l11.797.306c11.895.276 20.061 2.248 25.024 7.065zm86.955-23.52h-39.938c-3.986 0-6.638.144-8.867 1.587-2.312 1.423-3.202 3.534-3.202 6.322 0 3.314 1.951 5.568 4.791 6.544 2.312.771 4.795.996 8.444.996l11.878.304c11.983.284 19.982 2.258 24.86 7.072.891.67 1.422 1.422 2.033 2.175v-25z" fill="#fff"/></svg>
                    @endif
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <div class="text-sm font-medium text-gray-900">Ending with {{ $paymentMethod['card']['last4'] }}</div>
                        <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                            <div>Expires {{ $paymentMethod['card']['exp_month'] }}/{{ $paymentMethod['card']['exp_year'] }} </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                    <button @click="editing = !editing" type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <span x-text="(editing ? 'Cancel' : 'Edit' )">Edit</span>
                    </button>
                </div>
            </div>
        </div>
        <div x-cloak x-show="editing">
            <div class="mt-5" x-data="UpdatePaymentMethod">
                
                <form x-init="initUpdatePayment" wire:submit.prevent="savePaymentMethod">
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4">
                            <label for="billing_address_1" class="block text-sm font-medium leading-6 text-gray-900">Address line 1</label>
                            <input type="text" x-model="line1" value="{{ $paymentMethod['billing_details']['address']['line1'] }}" name="billing_address_1" id="billing_address_1" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                        </div>

                        <div class="col-span-4">
                            <label for="billing_address_2" class="block text-sm font-medium leading-6 text-gray-900">Address line 2</label>
                            <input type="text" x-model="line2" value="{{ $paymentMethod['billing_details']['address']['line2'] }}" name="billing_address_2" id="billing_address_2" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                        </div>

                        <div class="col-span-2">
                            <label for="billing_address_city" class="block text-sm font-medium leading-6 text-gray-900">Town / City</label>
                            <input type="text" x-model="city" value="{{ $paymentMethod['billing_details']['address']['city'] }}" name="billing_address_city" id="billing_address_city" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                        </div>

                        <div class="col-span-2">
                            <label for="billing_postcode" class="block text-sm font-medium leading-6 text-gray-900">Postcode / Zip code</label>
                            <input type="text" x-model="postal_code" value="{{ $paymentMethod['billing_details']['address']['postal_code'] }}" name="billing_postcode" id="billing_postcode" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                        </div>

                        <div class="col-span-2">
                            <label for="billing_country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                            <select x-data="{ }" x-init="$el.querySelector('option[value={{ $paymentMethod['billing_details']['address']['country'] }}]').selected = true" name="billing_country" id="billing_country" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                                <option value="AF">Afghanistan</option>
                                <option value="AX">�land Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia, Plurinational State of</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, the Democratic Republic of the</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">C�te d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Cura�ao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">R�union</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barth�lemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB" selected="selected">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.S.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="billing_state" class="block text-sm font-medium leading-6 text-gray-900">County / State</label>
                            <input type="text" x-model="state" name="billing_state" id="billing_state" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                        </div>

                        <div class="col-span-4">
                            <label for="cardHolderName" class="block text-sm font-medium leading-6 text-gray-900">Card holder name</label>
                            <input type="text" x-model="cardHolderName" name="cardHolderName" id="card-holder-name" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                        </div>

                        <div class="col-span-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Card details</label>
                            <div wire:ignore id="card-element" class="mt-2 w-full block rounded-md border-0 py-[10px] px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6"></div>
                            <div id="card-error"></div>
                        </div>
                        
                    </div>
                    <div class="bg-gray-50 px-4 py-3 mt-5 text-right sm:px-6">
                        <x-button id="card-button" class="inline-flex items-center" type="submit" data-secret="{{ $intent->client_secret }}" wire:target="savePaymentMethod" x-on:click.prevent="verify" wire:loading.attr="disabled">
                            <span>Update payment method</span>
                            <svg wire:loading class="ml-1 animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
        
    </div>
</section>

@pushOnce('footer-scripts')
    <script>
        window.UpdatePaymentMethod = () => {
            return {
                stripe: null,
                elements: null,
                cardElement: null,
                cardButton: null,
                clientSecret: null,
                line1: '{{ $paymentMethod['billing_details']['address']['line1'] }}',
                line2: '{{ $paymentMethod['billing_details']['address']['line2'] }}',
                city: '{{ $paymentMethod['billing_details']['address']['city'] }}',
                postal_code: '{{ $paymentMethod['billing_details']['address']['postal_code'] }}',
                country: '{{ $paymentMethod['billing_details']['address']['country'] }}',
                state: '{{ $paymentMethod['billing_details']['address']['state'] }}',
                cardHolderName: '{{ $paymentMethod['billing_details']['name'] }}',
                initUpdatePayment() {
                    this.stripe = Stripe('pk_test_51MnGlmHwvhcWXVfosjk5LiLigNP20cGTQG3BJwb63donAJgJEks8lGg2H5SbBhV057BGZrSQs9uC4cyUo5rKrPYK00NnE16gZQ');
                    this.elements = this.stripe.elements();
                    this.cardElement = this.elements.create('card', {
                        hidePostalCode: true
                    });
                    this.cardButton = document.getElementById('card-button');
                    this.clientSecret = this.cardButton.dataset.secret;
                    this.cardElement.mount('#card-element');
                    this.cardElement.on('change', (event) => {
                        this.cardButton.disabled = event.empty;
                        document.querySelector('#card-error').textContent = event.error ? event.error.message : "";
                    });
                },
                onCardChange( event ) {
                    this.cardButton.disabled = event.empty;
                    this.cardError.textContent = event.error ? event.error.message : '';
                },
                async verify() {
                    console.log('verifying');
                    const { setupIntent, error } = await this.stripe.confirmCardSetup(
                        this.clientSecret, {
                            payment_method: {
                                card: this.cardElement,
                                billing_details: {
                                    name: this.cardHolderName,
                                    email: '{{ auth()->user()->email }}',
                                    address: {
                                        city: this.city,
                                        country: this.country,
                                        line1: this.line1,
                                        line2: this.line2,
                                        postal_code: this.postal_code,
                                        state: this.state
                                    }
                                }
                            );

                            if(error) {
                                console.log(error.message)
                            } else {
                                console.log(setupIntent);
                                @this.set('new_payment_method_id', setupIntent.payment_method);
                                @this.call('savePaymentMethod');
                            }
<<<<<<< HEAD
                        }
                    );

                    if(error) {
                        console.log(error.message)
                    } else {
                        console.log(setupIntent);
                        @this.set('new_payment_method_id', setupIntent.payment_method);
                        @this.call('savePaymentMethod');
=======

                        }
>>>>>>> 1f45eaa8a142f727c95955ae425887ef394a60d2
                    }

                }
<<<<<<< HEAD
            }
        }
    </script>
@endPushOnce

@endif
=======
            </script>
        @endPushOnce

    @endif
>>>>>>> 1f45eaa8a142f727c95955ae425887ef394a60d2
</div>