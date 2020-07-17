@php
  $msg = data_get($data,'extra.message','Clique no link abaixo para ativar o cadastro.');
@endphp
<body>
    {{$msg}}
    <br>
    <br>
    {{ $data['userActivationUrl'] }}
</body>