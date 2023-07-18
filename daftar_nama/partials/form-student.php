
<form action="" method="POST">
        <label for="name">Nama</form>
        <br>
        <input type="text" name="name" id="name" value="<?= $data['name']; ?>">
        <br>

        <label for="email">email</form>
        <br>
        <input type="email" name="email" id="email" value="<?= $data['email']; ?>">
        <br>

        <label for="address">Alamat</form>
        <br>
        <textarea name="address" id="address" cols="30" rows="10" placeholder="Tulis Alamat Disini..." resize="none"><?= $data['address']; ?></textarea>
        <br>

        <button type="submit">Submit</button>
    </form>