<div class="container mt-1 position-relative " x-data="{


}">
    <div class="d-flex  flex-row justify-content-between gap-2">
        <button class="btn btn-warning " x-on:click="$refs.homeCatalog.scrollLeft-=100">
            < </button>
                <div x-ref="homeCatalog"
                    class="d-flex flex-row overflow-hidden gap-2 flex-nowrap align-items-center scroll-y px-10"
                    x-transition.scroll.1000ms>
                    @for ($i = 1; $i <= 400; $i++)
                        <div class="p-2 rounded bg-white border flex-shrink-0">
                            Chủ đề {{ $i }}
                        </div>
                    @endfor
                </div>
                <button class="btn btn-warning " x-on:click="$refs.homeCatalog.scrollLeft+=100">
                    >
                </button>
    </div>
</div>
