<div id="notification" class="justify-content-around notification"></div>
<footer class="d-flex flex-column justify-content-center align-items-center border-top">
    <h1>eUniversity</h1>
    <p>Copyright &copy; by Lê Quang Thanh</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src={{ asset('js/bootstrap.bundle.min.js') }}></script>
<script src="{{asset('js/nofication.js') }}"></script>
<script>
    @if(session('success'))
        showNotification("{{ session('success') }}", "success");
    @endif
    @if(session('warning'))
        showNotification("{{ session('warning') }}", "warning");
    @endif

    @if(session('error'))
        showNotification("{{ session('error') }}", "error");
    @endif
    @if(session('infor'))
        showNotification("{{ session('infor') }}", "infor");
    @endif
</script>
