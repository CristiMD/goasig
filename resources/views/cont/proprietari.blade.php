<h3 style="text-align: center;">Proprietari</h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'proprietari'])
    <div id="lista-proprietar" class="account-extra">
        @if (count($content) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Cod unic</th>
                        <th>Nr CI</th>
                        <th>Serie CI</th>
                        <th>Localitate</th>
                        <th>Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $proprietar)
                        <tr>
                            <td>{{$proprietar->nume.' '.$proprietar->prenume}}</td>
                            <td>{{$proprietar->cod_unic}}</td>
                            <td>{{$proprietar->nr_ci}}</td>
                            <td>{{$proprietar->serie_ci}}</td>
                            <td>{{$proprietar->localitate}}</td>
                            <td><div class="actiuni">
                                <button data-proprietar={{$proprietar->cod_unic}} class="proprietar-edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button data-proprietar={{$proprietar->cod_unic}} class="proprietar-delete"><i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                </div></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="with-padding">Nu sunt proprietari de afisat</span>
        @endif
    </div>
    <div id="edit-form-proprietar" class="edit-form">
        <div class="e-half">
        <div><span class="span-detalii">Nume: </span><input id="nume-proprietar" type="text"/></div>
        <div><span class="span-detalii">Prenume: </span><input id="prenume-proprietar" type="text"/></div>
        <div><span class="span-detalii">Cod unic: </span><input  class="show-info" disabled id="cod-proprietar" type="text"/></div>
        <div><span class="span-detalii">Nr CI: </span><input id="nr-ci-proprietar" type="text"/></div>
        <div><span class="span-detalii">Serie CI: </span><input id="serie-ci-proprietar" type="text"/></div>
        <div><span class="span-detalii">Tip persoana: </span><select id="tip_persoana-proprietar">
            <option value="pf">Persoana fizica</option>
            <option value="pj">Persoana juridica</option>
        </select></div>
        <div><span class="span-detalii">Judet: </span> 
            <select id="judet-proprietar">
                <option value="ALBA">ALBA             </option>
                <option value="ARAD">ARAD             </option>
                <option value="ARGES">ARGES            </option>
                <option value="BACAU">BACAU            </option>
                <option value="BIHOR">BIHOR            </option>
                <option value="BISTRITA-NASAUD">BISTRITA NASAUD  </option>
                <option value="BOTOSANI">BOTOSANI         </option>
                <option value="BRAILA">BRAILA           </option>
                <option value="BRASOV">BRASOV           </option>
                <option value="BUCURESTI">BUCURESTI        </option>
                <option value="BUZAU">BUZAU            </option>
                <option value="CALARASI">CALARASI         </option>
                <option value="CARAS-SEVERIN">CARAS SEVERIN    </option>
                <option value="CLUJ">CLUJ             </option>
                <option value="CONSTANTA">CONSTANTA        </option>
                <option value="COVASNA">COVASNA          </option>
                <option value="DAMBOVITA">DAMBOVITA        </option>
                <option value="DOLJ">DOLJ             </option>
                <option value="GALATI">GALATI           </option>
                <option value="GIURGIU">GIURGIU          </option>
                <option value="GORJ">GORJ             </option>
                <option value="HARGHITA">HARGHITA         </option>
                <option value="HUNEDOARA">HUNEDOARA       </option>
                <option value="IALOMITA">IALOMITA         </option>
                <option value="IASI">IASI             </option>
                <option value="ILFOV">ILFOV            </option>
                <option value="MARAMURES">MARAMURES        </option>
                <option value="MEHEDINTI">MEHEDINTI        </option>
                <option value="MURES">MURES            </option>
                <option value="NEAMT">NEAMT            </option>
                <option value="OLT">OLT              </option>
                <option value="PRAHOVA">PRAHOVA          </option>
                <option value="SALAJ">SALAJ            </option>
                <option value="SATU_MARE">SATU MARE        </option>
                <option value="SIBIU">SIBIU            </option>
                <option value="SUCEAVA">SUCEAVA          </option>
                <option value="TELEORMAN">TELEORMAN        </option>
                <option value="TIMIS">TIMIS            </option>
                <option value="TULCEA">TULCEA           </option>
                <option value="VILCEA">VALCEA           </option>
                <option value="VASLUI">VASLUI           </option>
                <option value="VRANCEA">VRANCEA          </option>
        </select>
    </div>
</div>
<div class="e-half">
        <div><span class="span-detalii">Localitate: </span>
            <select id="localitate">
                <option value="">--alege localitatea--</option>
            </select>
        </div>
        <div><span class="span-detalii">Strada: </span><input id="strada-proprietar" type="text"/></div>
        <div><span class="span-detalii">Numar: </span><input id="numar-proprietar" type="text"/></div>
        <div><span class="span-detalii">Bloc: </span><input id="bloc-proprietar" type="text"/></div>
        <div><span class="span-detalii">Scara: </span><input id="scara-proprietar" type="text"/></div>
        <div><span class="span-detalii">Etaj: </span><input id="etaj-proprietar" type="text"/></div>
        <div><span class="span-detalii">Apartament: </span><input id="apartament-proprietar" type="text"/></div>
</div>
        <div class="actiuni-edit"><button class="editare e-submit" id="editare-proprietar">Editeaza</button>
            <button class="editare e-cancel" id="cancel-editare-proprietar">Anuleaza</button></div>
    </div>
</div>