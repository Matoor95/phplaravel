<?php
// C'est ici quon va coder la logique metier liee a la table produit
// proprietes = colonne de la table
// methodes = operation CRUD


require_once __DIR__ . '/../core/Database.php';
class Product
{
    private ?int $id;
    private string $libelle;
    private float $prix;
    private ?string $description;
    private ?string $created_at;
    public function __construct(?int $id = null, string $libelle = '', float $prix = 0.0, ?string $description = null, ?string $created_at = null)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->description = $description;
        $this->created_at = $created_at;
    }
    // GETTER ET SETTER 
    public function getId (): ?int
    {
        return $this->id;
    }
    public function getLibelle(): string
    {
        return $this->libelle;
    }
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }
    public function getPrix():float{
        return $this->prix;
    }
    public function  setPrix(float $prix): void
    {
        $this->prix = $prix;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }
    // Retourne tous les produits sous forme de tableau d'objets Product
    public static function  All(): array{
        $pdo=Database::getConnection();
        $ql="SELECT * FROM products ORDER BY created_at DESC";
        $stmt=$pdo->query($ql);
        $rows=$stmt->fetchAll();
        $products=[];
        foreach($rows as $row){
            $products[]=self::fromArray($row);
        }
        return $products;

    }
    // Retourne un produit par son id
    public static function findById(int $id): ?Product{
        $pdo=Database::getConnection();
        $sql='SELECT * FROM products WHERE id=:id';
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $row=$stmt->fetch();
        if(!$row){
            return null;
        }
        return self::fromArray($row);
       
    }
// creer un objet produit a partir d'un tableau associatif (ligne sql)
    private static function fromArray(array $row): Product{
        return new Product(
            isset($row['id'])? (int) $row['id']:null,
            $row['libelle'],
            isset($row['prix'])? (float) $row['prix']:0.0,
            $row['description'] ?? null,
            $row['created_at'] ?? null

        );

    }

}
