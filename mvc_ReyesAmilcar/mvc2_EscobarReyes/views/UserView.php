
<?php
class UserView {
public function showAllUsers ($users) {
echo "<h2>Lista de Usuarios</h2>";
echo "<ul>";
foreach ($users as $user) {
    echo "<li>{$user['name']} - {$user['email']}
    [<a href='index.php?action=update&id={$user['id']}'>Editar</a>]
    [<a href='index.php?action=delete&id={$user['id']}'>Eliminar</a>]</li>";
} 
    echo "</ul>";
    echo "<p><a href='index.php?action=create'>Agregar Nuevo Usuario</a></p>";
    echo "<p><a href='index.php?action=createpdf'>generar pdf</a></p>";
}
    
public function showUserForm($action, $user = null) {
    echo "<h2>" . ($user ? "Editar Usuario" : "Agregar Nuevo Usuario") . "</h2>"; 
    echo "<form action='$action' method='post'>";
    if ($user) {
        echo "<input type='hidden' name='id' value='{$user['id']}' />";
        echo "Nombre: <input type='text' name='name' value='{$user['name']}' /><br>"; 
        echo "Email: <input type='text' name='email' value='{$user['email']}' /><br>"; 
    } else {
        echo "Nombre: <input type='text' name='name' /><br>";
        echo "Email: <input type='text' name='email' /><br>";
    }
    echo "<input type='submit' value='Guardar' />";
    echo "</form>";
}
}
?>