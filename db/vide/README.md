# Base de données

La base de données jeanbdd est vide par défaut. Il faut y ajouter un utilisateur comme ci-dessous.

### Utilisateur

```
INSERT INTO `users`(`username`, `password`, `name`, `firstname`, `email`, `addDate`) VALUES ('Jean2145','$2y$10$ltNYgYnObNYW7tKksMrImOYU41W0g21bKO70lb.DZnpKkQ2IaIxf6','Jean','Forteroche','contact@jeanforteroche.com', NOW())
```
Identifiant : Jean2145
Mot de passe : bGQX#`75).Pr2Jpg

### Articles

```
INSERT INTO `articles`(`title`, `content`, `auteur`, `addDate`, `modDate`) VALUES ('Un matin en Alaska', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis semper quam, sed malesuada tellus tincidunt vel. Nullam consectetur sem egestas orci laoreet, ut feugiat est molestie. Proin sagittis augue non elit ultrices, eu elementum arcu mollis. Phasellus a nulla vitae tellus gravida volutpat vitae vitae massa. Donec id bibendum odio. Maecenas vel elit quis massa iaculis scelerisque. Suspendisse gravida sem nec arcu venenatis, eu egestas mi sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at lobortis lectus, id facilisis leo. Mauris ultricies nibh elementum leo facilisis, <strong>nec molestie dui tristique</strong>. Donec cursus molestie felis, non tempor leo.</p>
<h4>Chapitre 1</h4>
<p>Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce fringilla est eleifend magna luctus, eu interdum ligula egestas. Praesent rutrum, odio in vulputate sollicitudin, orci tellus gravida leo, tincidunt tempor nulla dolor eu erat. Nulla ornare turpis in tristique volutpat. Pellentesque sed interdum nunc, ultricies maximus lacus. Vivamus sed dui nec nisl interdum varius. Pellentesque elementum neque et nibh facilisis tempor. Nunc tincidunt sem ac magna porttitor, quis lobortis diam blandit. Ut ornare sed dolor nec lobortis. Donec sed mauris nulla. Sed laoreet risus a tellus bibendum malesuada. Cras elementum cursus lectus in volutpat. Morbi blandit non est at rhoncus.</p>
<p>Nulla pretium imperdiet orci, at commodo ante pulvinar at. Vivamus ac tempus lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut urna ligula. Nunc a orci sagittis ante iaculis euismod. Aliquam scelerisque quam ac nibh dapibus volutpat. Quisque id nulla orci. Curabitur aliquam laoreet enim, ut condimentum urna dapibus vel. Duis vel nibh lectus. Curabitur elementum pellentesque semper. Maecenas blandit rhoncus iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<h4>Chapitre 2</h4>
<p>Sed volutpat, libero nec pulvinar suscipit, justo tellus facilisis elit, sed venenatis lectus ligula ac sapien. Nunc ac purus id turpis euismod dapibus. Pellentesque in odio vitae erat rhoncus commodo congue vehicula turpis. Sed bibendum aliquam nibh. Nunc eu cursus enim, et tempor est. Aenean ante nisl, blandit non tellus id, viverra venenatis tellus. Mauris ante nisi, posuere id dui a, vehicula placerat elit. Aenean malesuada, erat at venenatis ornare, ligula orci elementum enim, at rhoncus augue nisi vel eros.</p>', 'Jean2145', NOW(), NOW())
```
