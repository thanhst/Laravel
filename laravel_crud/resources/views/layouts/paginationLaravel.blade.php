<div class="container-fluid d-flex justify-content-center mt-5">
    <div class="wrapper mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $books->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>
</div>
