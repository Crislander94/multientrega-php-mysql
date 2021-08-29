                        $id = $forma_pago['id'];
                        $descripcion = $forma_pago['descripcion'];
                        echo "<option value=".$id.">".$descripcion."</option>";
                    }
                ?>
            </select>
            <input  type='hidden' id='strings_pagos' name='strings_pagos'/>
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="terminos_condiciones" id="terminos_condiciones" > ¿Está de acuerdo con los términos y condiciones?
                </label>
            </div>
        </div>
        <div id="btnGuardar"><button type="submit" class="btn btn-primary">Guardar</button></div>
    </form> 
</div>

<?php include_once 'partials/footer.php'; ?>