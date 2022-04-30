<script>
    let maxScrollDepth = 0;

    function send() {
        let requestOptions = {
            method: 'POST',
            redirect: 'follow'
        };
        let scrollDepth = (document.documentElement || document.body.parentNode || document.body).scrollTop;
        maxScrollDepth = maxScrollDepth < scrollDepth ? scrollDepth : maxScrollDepth;
        let params = new URLSearchParams();
        params.append('id', {{ session('analytics_id') }});
        params.append('payload[innerWidth]', window.innerWidth);
        params.append('payload[innerHeight]', window.innerHeight);
        params.append('payload[outerWidth]', window.outerWidth);
        params.append('payload[outerHeight]', window.outerHeight);
        params.append('payload[scrollDepth]', maxScrollDepth);

        fetch('{{ route('api.analytics.log') }}' + '?' + params, requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));

        setTimeout(send, 5000);
    }
    send();
</script>
