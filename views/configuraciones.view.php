<div class="contenido">
<!-- // 022864 ===> Color 1
// #3F386B ===> Color 2
// #3A553A ===> Color 3
// #0C9789 ===> Color 4
// #0693C6 ===> Color 5 
// #282a35 ===> Color 5 -->
    <div class="card">
        <div class="card-header">
            <form action="configuracion.php" class="d-flex justify-content-between align-items-center" method="post">
                <div style="width:40%">
                    <select class="select_custom_styles p-2 text-white" name="color" id="value_color" style="width:80%; background-color:#17a2b8;">
                        <option value="#282a35">Default</option>
                        <option value="#07A1DA">Peacok Blue</option>
                        <option value="#3F386B">Dark Purple</option>
                        <option value="#CC7B80">Carmine</option>
                        <option value="#0C9789">Abyss Green</option>
                        <option value="#6D72C3">Violet</option>
                    </select>
                </div>
                <div>
                    <input class="btn btn-info" type="submit" value="Cambiar estilo del sitio">
                </div>
            </form>
        </div>
    </div>
    <div id="paleta" class="d-flex justify-content-center align-items-center" style="width:100%; height:200px; box-shadow: 0 0 10px rgba(0,0,0,.5); transition:background-color .5s ease; border-radius: 0 0 5px 5px;">
        <h3 class="text-center text-white">MIS ESTILOS</h3>
    </div>
</div>
<script>
    const value_color = document.getElementById('value_color');
    const paleta = document.getElementById('paleta');
    paleta.style.backgroundColor = value_color.value;
    value_color.addEventListener('change', () => {
        paleta.style.backgroundColor = value_color.value;
    });
</script>