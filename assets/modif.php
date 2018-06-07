<?php<tr>
    <td>Début</td>
    <td><input type="time" name="ld" value="'. obtenir_heure_debut("$donnees["id"]","lundi","paire") .'"></td>
    <td><input type="time" name="lf" value="'. obtenir_fin_debut("$donnees["id"]","lundi","paire") .'"></td>
    <td><input type="time" name="md" value="'.obtenir_heure_debut("$donnees["id"]","mardi","paire").'"></td>
    <td><input type="time" name="mf" value="'.obtenir_fin_debut("$donnees["id"]","mardi","paire").'"></td>
  </tr>
  <tr>
    <td>Fin</td>
    <td><input type="time" name="jd" value="'.obtenir_heure_debut("$donnees["id"]","jeudi","paire").'"></td>
    <td><input type="time" name="jf" value="'.obtenir_fin_debut("$donnees["id"]","mardi","paire").'"></td>
    <td><input type="time" name="vd" value="'.obtenir_heure_debut("$donnees["id"]","vendredi","paire").'"></td>
    <td><input type="time" name="vf" value="'.obtenir_fin_debut("$donnees["id"]","vendredi","paire").'"></td>
  </tr>?>