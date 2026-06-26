<?php
namespace app\Repositories;
class InventoryRepository extends BaseRepository{
 public function allItems():array{ return $this->fetchAll("SELECT 'book' item_type,id,CONCAT(isbn,' - ',title) item_name,quantity FROM books UNION ALL SELECT 'newspaper',id,name,quantity FROM newspapers UNION ALL SELECT 'magazine',id,name,quantity FROM magazines ORDER BY item_type,item_name"); }
 public function findItem(string $type,int $id):?array{ $map=['book'=>['books','title','isbn'],'newspaper'=>['newspapers','name','name'],'magazine'=>['magazines','name','name']]; if(!isset($map[$type])) return null; [$table,$title,$code]=$map[$type]; return $this->fetch("SELECT ? item_type,id,$title item_title,$code item_code,quantity FROM $table WHERE id=?",[$type,$id]); }
 public function increase(string $type,int $id):bool{ $table=$this->table($type); return $table?$this->execute("UPDATE $table SET quantity=quantity+1 WHERE id=?",[$id]):false; }
 public function decrease(string $type,int $id):bool{ $table=$this->table($type); return $table?$this->execute("UPDATE $table SET quantity=quantity-1 WHERE id=? AND quantity>0",[$id]):false; }
 private function table(string $type):?string{ return ['book'=>'books','newspaper'=>'newspapers','magazine'=>'magazines'][$type] ?? null; }
 public function hasBorrowHistory(string $type,int $id):bool{ return (int)$this->fetch("SELECT COUNT(*) c FROM borrows WHERE item_type=? AND item_id=?",[$type,$id])['c']>0; }
 public function lowStock():array{ return $this->fetchAll("SELECT 'Sách' item_type,title item_title,quantity FROM books WHERE quantity<=2 UNION ALL SELECT 'Báo',name,quantity FROM newspapers WHERE quantity<=2 UNION ALL SELECT 'Tạp chí',name,quantity FROM magazines WHERE quantity<=2 ORDER BY quantity ASC LIMIT 10"); }
}
