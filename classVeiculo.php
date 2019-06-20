<?php 
// extends PDO para conectar com banco de dados
class Carro extends PDO
{
    private $codigovei, $modelo, $marca, $descricao, $portas, $ano_fab, $ano_mod, $cor, $km, $placa, $valor, $obs, $ativo, $dtinclu, $fotonome1;

    public function getcodigovei(){
        return $this->codigovei;
    }
    public function getmodelo() {
        return $this->modelo;
    }
    public function getmarca(){
        return $this->marca;
    }
    public function getdescricao(){
        return $this->descricao;
    }
    public function getportas(){
        return $this->portas;
    }
    public function getano_fab(){
        return $this->ano_fab;
    }
    public function getano_mod(){
        return $this->ano_mod;
    }
    public function getcor() {
        return $this->cor;
    }
    public function getkm(){
        return $this->km;
    }
    public function getplaca(){
        return $this->placa;
    }
    public function getvalor(){
        return $this->valor;
    }
    public function getobs(){
        return $this->obs;
    }
    public function getdtinclu(){
        return $this->dtinclu;
    }
    public function getativo(){
        return $this->ativo;
    }
    public function getfotonome1(){
        return $this->fotonome1;
    }

    public function setcodigo($cod )
    {
        $this->codigovei = $cod;
    }
    public function setmodelo($desc){
        $this->modelo = $desc;
    }
    public function setmarca($unid){
        $this->marca = $unid;
    }
    public function setdescricao($vcusto) {
        $this->descricao = $vcusto;
    }
    public function setportas($marg){
        $this->portas = $marg;
    }
    public function setano_fab($vlv){
        $this->ano_fab = $vlv;
    }
    public function setano_mod($est){
        $this->ano_mod = $est;
    }

    public function setcor($id){
        $this->cor = $id;
    }
    public function setkm($desc){
        $this->km = $desc;
    }
    public function setplaca($unid){
        $this->placa = $unid;
    }
    public function setvalor($vcusto) {
        $this->valor = $vcusto;
    }
    public function setobs($marg){
        $this->obs = $marg;
    }
    public function setdtinclu($vlv){
        $this->dtinclu = $vlv;
    }
    public function setativo($est){
        $this->ativo = $est;
    }
    public function setfotonome1($vcusto) {
        $this->fotonome1 = $vcusto;
    }


    public function Incluir()
    {
        $data = [
            'modelo' => $this->getmodelo(),
            'marca' => $this->getmarca(),
            'descricao' => $this->getdescricao(),
            'portas' => $this->getportas(),
            'ano_fab' => $this->getano_fab(),
            'ano_mod' => $this->getano_mod(),
            'cor' => $this->getcor(),
            'km' => $this->getkm(),
            'placa' => $this->getplaca(),
            'valor' => $this->getvalor(),
            'obs' => $this->getobs(),
            'dtinclu' => $this->getdtinclu(),
            'ativo' => $this->getativo(),
            'fotonome1' => $this->getfotonome1()
        ];
        
        $sql = "INSERT INTO veiculos ( modelo, marca, descricao, portas, ano_fab, ano_mod, cor, km, placa, valor, obs, dtinclu, ativo, fotonome1)
                 VALUES (:modelo, :marca, :descricao, :portas, :ano_fab, :ano_mod, :cor, :km, :placa, :valor, :obs, :dtinclu, :ativo, :fotonome1)";
        
        // Preparação da instrução 
        $stmt= $this->prepare($sql);
        $resp = $stmt->execute($data);//$data
        return $resp;
    }

    public function Alterar(){
        $data = [
            'codigo' => $this->getcodigovei(),
            'modelo' => $this->getmodelo(),
            'marca' => $this->getmarca(),
            'descricao' => $this->getdescricao(),
            'portas' => $this->getportas(),
            'ano_fab' => $this->getano_fab(),
            'ano_mod' => $this->getano_mod(),
            'cor' => $this->getcor(),
            'km' => $this->getkm(),
            'placa' => $this->getplaca(),
            'valor' => $this->getvalor(),
            'obs' => $this->getobs(),
            'dtinclu' => $this->getdtinclu(),
            'ativo' => $this->getativo(),
            'fotonome1' => $this->getfotonome1()
        ];
         
        $sql = "UPDATE veiculos SET modelo=:modelo, marca= :marca, descricao= :descricao, portas= :portas, ano_fab= :ano_fab, ano_mod= :ano_mod, cor= :cor,
        km=:km, placa=:placa, valor=:valor, obs=:obs, ativo=:ativo, dtinclu=:dtinclu, fotonome1=:fotonome1 WHERE codigovei=:codigo";
        
        // Preparação da instrução 
        $stmt= $this->prepare($sql);
        if( $stmt->execute($data) )
            {
                return true;
            }
        return false;
    }

    public function Excluir($id){
        $sql = "DELETE FROM veiculos WHERE codigovei=".$id;
        $this->query($sql);
    }

    public function Consultar($id)
    {
        $sql = "SELECT * FROM veiculos where codigovei=".$id;
        if($base = $this->query($sql)){   // $base = retorno do banco, se for (false) - indica que não há item com este código
            while($row = $base->fetchObject())
                {
                 $this->getcodigovei( $row->codigovei);
                 $this->setmodelo($row->modelo);
                 $this->setmarca( $row->marca);
                 $this->setdescricao($row->descricao);
                 $this->setportas($row->portas);
                 $this->setano_fab($row->ano_fab);
                 $this->setano_mod($row->ano_mod);
                 $this->setcor($row->cor);
                 $this->setkm($row->km);
                 $this->setplaca($row->placa);
                 $this->setobs($row->obs);
                 $this->setvalor($row->valor);
                 $this->setdtinclu($row->dtinclu);
                 $this->setativo($row->ativo);
                 $this->setfotonome1( $row->fotonome1);
               return true;
            }
         }
         return false;
    }

    public function Contar(){
		$resp = $this->prepare("SELECT count(*) as totalreg FROM veiculos ");
		$resp->execute();
		$total = $resp->fetch(PDO::FETCH_OBJ);
		return $total->totalreg;
	}

    public function ultimoID(){
		$resp = $this->prepare("SELECT max(codigovei) + 1 as cod FROM veiculos ");
		$resp->execute();
		$total = $resp->fetch(PDO::FETCH_OBJ);
		return $total->cod == NULL ? 1 : $total->cod;
    }
    
    public function Listar(){
        return $this->query( "select * from veiculos order by descricao");
    }
	
	public function ListarPag($inicio , $quant ){
        return $this->query( "select * from veiculos order by descricao limit $inicio,$quant ");
    }  
}?>