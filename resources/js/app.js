import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

let debounceTimer

function fetchData(url) {
    const query = $('#search').val()
    const target = $('#search').data('target')

    $.ajax({
        url: url,
        type: 'GET',
        data: { query: query },
        success: function (res) {
            $(target).html(res.html)
            $('#pagination-links').html(res.pagination) // render pagination juga
        },
        error: function (err) {
            console.error('Gagal mengambil data:', err)
        },
    })
}

$(document).ready(function () {
    // Real-time search dengan debounce
    $('#search').on('keyup', function () {
        clearTimeout(debounceTimer)
        debounceTimer = setTimeout(() => {
            const url = $(this).data('url')
            fetchData(url)
        }, 300)
    })

    // Pagination AJAX
    $(document).on('click', '#pagination-links a', function (e) {
        e.preventDefault()
        const url = $(this).attr('href')
        if (url) {
            fetchData(url)
        }
    })
})

$(document).ready(function () {
    window.toast = {
        success: function (message) {
            const $toast = $(`
                <div class="p-4 bg-success text-white rounded-lg shadow-soft flex items-center justify-between animate-fade-in">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>${message}</span>
                    </div>
                    <button class="ml-4 text-white hover:text-white/80 close-toast">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `)

            $('#toast-container').append($toast)
            setTimeout(() => $toast.remove(), 5000)
        },

        error: function (message) {
            const $toast = $(`
                <div class="p-4 bg-danger text-white rounded-lg shadow-soft flex items-center justify-between animate-fade-in">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>${message}</span>
                    </div>
                    <button class="ml-4 text-white hover:text-white/80 close-toast">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `)

            $('#toast-container').append($toast)
            setTimeout(() => $toast.remove(), 5000)
        },
    }

    // Event handler untuk close manual toast
    $(document).on('click', '.close-toast', function () {
        $(this).closest('div').remove()
    })
})
