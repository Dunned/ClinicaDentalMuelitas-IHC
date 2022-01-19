<?php include 'includes/templates/header.php'; ?>
  
  <section class="seccion contenedor">
    <h2>Registro de Citas</h2>

    <form id="registro" class="registro" action="pagar.php" method="POST">
        <div id="datos_usuario" class="registro registro-campos">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre">
            </div>
            <div class="campo">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Tu Email">
            </div>
        </div> <!--DATOS DEL USUARIO FIN-->
        <div id="error"></div>

        <div id="paquetes" class="paquetes">
            <h3>Elige el tipo de Cita</h3>
            <div class="lista-precios">

                <div class="tabla-precio">
                  <h3 class="titulo-precio">Consulta Online</h3>
                  <p class="numero numero-precio">S/30</p>
                  <ul class="caracteristica">
                    <li>Opcion1</li>
                    <li>Opcion2</li>
                  </ul>
                  <a id="online" href="#" class="button verde">
                    Reservar</a>
                </div>

                <input id="tipo_cita" type="hidden" name="tipo">  

                <div class="tabla-precio">
                  <h3 class="titulo-precio">Consulta Presencial</h3>
                  <p class="numero numero-precio">S/50</p>
                  <ul class="caracteristica">
                    <li>Opcion1</li>
                    <li>Opcion2</li>
                  </ul>
                  <a id="presencial" href="#" class="button verde">
                    Reservar</a>
                </div>
    
            </div>
        </div> <!--Paquetes-->

        <div class="contenedor contenedor-dia">
            <h3 class="tituloHorario">Elige los horarios</h2>

            <div class="dia online">
                <h4 class="tituloDia">Jueves</h4>
                <fieldset class="contenedorDia">
                    <div class="contenedorDoctor">
                        <div class="contenedorInputHora">
                            <input type="radio" name="registro" id="opcion1" value="opcion1">
                            <label for="opcion1">02:00:00 PM</label> 
                        </div>
                        <label class="nombreDoctor" for="opcion1">William Cachique</label>
                    </div>
        
                    <div class="contenedorDoctor">
                        <div class="contenedorInputHora">
                            <input type="radio" name="registro" id="opcion2" value="opcion2">
                            <label for="opcion2">04:00:00 PM</label> 
                        </div>
                        <label class="nombreDoctor" for="opcion2">Eduardo Jauregui</label>
                    </div>
                </fieldset>
            </div>

            <div class="dia online presencial">
              <h4 class="tituloDia">Viernes</h4>
              <fieldset class="contenedorDia">
                  <div class="contenedorDoctor">
                      <div class="contenedorInputHora">
                          <input type="radio" name="registro" id="opcion1" value="opcion1">
                          <label for="opcion1">02:00:00 PM</label> 
                      </div>
                      <label class="nombreDoctor" for="opcion1">William Cachique</label>
                  </div>
      
                  <div class="contenedorDoctor">
                      <div class="contenedorInputHora">
                          <input type="radio" name="registro" id="opcion2" value="opcion2">
                          <label for="opcion2">04:00:00 PM</label> 
                      </div>
                      <label class="nombreDoctor" for="opcion2">Eduardo Jauregui</label>
                  </div>
              </fieldset>
          </div>

          </div>
        
          <div id="resumen" class="resumen">
            <h3 class="tituloHorario">Pagos y extras</h3>
            <div class="caja">
                <div class="extras">
                  <div class="contenedor-orden">
                    <div class="orden">
                      <label for="blanqueamiento">Servicio de blanqueamiento Dental Basico (S/.50.00)</label>
                      <input type="checkbox" name="extra1" id="blanqueamiento" value="blanqueamiento">
                  </div>
                    <div class="orden">
                        <label for="blanqueamiento">KIT DE CUIDADO DENTAL (PASTA DIENTES + ENJUAGUE) (S/20.00)</label>
                        <input type="checkbox" name="extra2" id="cuidado" value="cuidado">
                    </div>
                  </div>
                    <input type="button" id="calcular" class="button" value="Calcular">
                </div> <!--CIERRE EXTRAS-->

                <div class="total">
                    <p>Resumen</p>
                    <div id="lista-productos">
                    </div>
                    <p>Total</p>
                    <div id="suma-total">
                    </div>
                    <input type="hidden" name="total_pedido" id="total_pedido" value="total_pedido">
                    <input type="submit" id="btnRegistro" class="button" name="submit" value="Pagar">
                </div>
            </div>
          </div>
    </form>
  </section>

  <?php include 'includes/templates/footer.php'; ?>