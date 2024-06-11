<?php

class ProductDatabaseCaller
{
    private PDO $pfo;
    private string $upload_dir = '/uploads/img/';

    public function __construct( PDO $pdo ){
        $this->pdo = $pdo;
    }

    // Fetch Functions
    public function fetchAll(): array {
        $stmt = $this->pdo->prepare( 'SELECT * FROM products ORDER BY up_votes - down_votes DESC');
        $stmt->execute();

        return $stmt->fetchAll( PDO::FETCH_CLASS, Product::class );
    }

    public function fetchbyId( string $id ): Product|bool {
        $stmt = $this->pdo->prepare( 'SELECT * FROM products WHERE id = :id' );
        if ( ! $stmt ) {
            return false;
        }
        $stmt->execute( [ ':id' => $id ] );
        return $stmt->fetchObject( Product::class );
    }

    // Admin Upload, Edit And Delete Function
    public function handleUploadProduct( string $filename, string $title, string $tmp_path ): void {
        $path = get_file_path( $filename, $this->upload_dir );
        $final_filename = pathinfo( $path, PATHINFO_BASENAME );
        scale_and_copy( $tmp_path, $path );
        $stmt = $this->pdo->prepare( 'INSERT INTO products (file_name, title) VALUES (:filename, :title_text)' );
        $stmt->execute( [
            'filename' => $final_filename,
            'title_text' => $title,
        ] );
    }

    public function deleteProduct( string $id ): void {
        $file_name = $this->fetchbyId( $id )->file_name;
        $stmt = $this->pdo->prepare( 'DELETE FROM products WHERE id = :id' );
        $stmt->execute( ['id' => $id ] );

        if ( $file_name ) {
            unlink( dirname( __DIR__ ) . $this->upload_dir . $file_name );
        }
    }

    public function editProductTitle( string $id, string $new_title ): void {
        $stmt = $this->pdo->prepare( 'UPDATE products SET title = :title WHERE id = :id' );
        $stmt->execute( ['id' => $id, 'title' => $new_title] );
    }

    // User Up- and Down-Vote
    public function handleUpvote( string $id ) {
        $stmt = $this->pdo->prepare( 'UPDATE products SET up_votes = up_votes + 1 WHERE id = :id' );
        $stmt->execute( ['id' => $id ] );
    }

    public function handleDownvote( string $id ) {
        $stmt = $this->pdo->prepare( 'UPDATE products SET down_votes = down_votes + 1 WHERE id = :id' );
        $stmt->execute( ['id' => $id ] );
    }
}
