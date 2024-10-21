<?php
require_once 'IEntity.php';

class Asociado implements IEntity
{

    const RUTA_LOGOS_ASOCIADOS = '/public/images/asociados/';

    private $id;
    private string $nombre;
    private string $logo;
    private string $descripcion;

    public function __construct(string $nombre = "", string $logo = "", string $descripcion = "")
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Asociado
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): Asociado
    {
        $this->logo = $logo;
        return $this;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): Asociado
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getUrlAsociados(): string
    {
        return self::RUTA_LOGOS_ASOCIADOS . $this->getNombre();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion()
        ];
    }
}
