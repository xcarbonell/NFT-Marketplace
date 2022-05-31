@extends('layouts.app')
@section('content')
    @auth
        <div id="userid" hidden>
            {{ Auth::user()->id }}
        </div>
        @if (Auth::user()->role_id == 1)
            <p>Las distintas operaciones realizadas en nuestro sitio nos han generado un beneficio total de:</p>
            <div id="divBenefits"></div>
        @endif
    @endauth
    <script>
        const divBenefits = document.getElementById("divBenefits");
        const showBenefits = document.getElementById("btnBenefits");
        async function getBenefits() {
            const responseBenefits = await fetch(`{{ env('APP_URL') }}/api/benefits`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            console.log(responseBenefits);
            divBenefits.innerHTML = `${responseBenefits.data} €`
        }
        getBenefits();
    </script>
@endsection
