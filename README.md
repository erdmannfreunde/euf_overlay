# euf_overlay
Mit der Erweiterung **euf_overlay** kannst du ein Overlay (auch als Popup oder Popover bekannt) erstellen, das sich über die eigentliche Website legt.

Dabei kannst du wählen zwischen 4 Zeitpunkten der Einblendung wählen:
- Beim Verlassen der Seite (Mauscursor bewegt sich außerhalb des Browserfensters)
- Beim Laden der Seite
- Nach einer bestimmten Zeit, zum Beispiel 60 Sekunden
- Nachdem der Besucher einen bestimmten Teil der Webseite gescrollt hat

## Einrichtung
Nach der Installation steht ein weiteres Frontend-Modul „EuF-Overlay“ zur Verfügung. Hier kannst du individuelle Inhalte für das Overlay verfassen. Über Inserttags kannst du außerdem weitere Frontend-Module einfügen (z.B. ein Modul Newsletter-Anmeldung). EuF-Overlay kann dann als Modul im Seitenlayout (am Besten am Ende / im Footer der Seite) oder als Content-Element verwendet werden.

## Tipps
Möchte man in seinem Text z.B. einen Button als Link und gleichzeitig zum Setzen des Cookies einsetzen, kann man die CSS-Klasse `euf_overlay__accept` vergeben z. B. 

```
<p>Weitere Informationen finden Sie <a href="{{link_url::123}}" class="button euf_overlay__accept" title="mehr...">hier</a></p>
```

## Abhängigkeiten
Zur Verwendung muss jQuery im Seitenlayout aktiviert sein.

*Die Erweiterung wurde von [LAUKIEN](http://www.laukien.de/) beauftragt und finanziert.*
