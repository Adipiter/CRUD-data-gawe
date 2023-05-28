<?php

#   find()
#   mengambil baris data dengan primary key = 1
$model = new MyModel();
$data = $model->find(1);

#   where()
#   mengambil semua baris data dengan field1 = 'value1'
$model = new MyModel();
$data = $model->where('field1', 'value1')->findAll(); 

#   select()
#   mengambil data dari kolom field1 dan field2 saja
$model = new MyModel();
$model->select('field1, field2');
$data = $model->findAll();

#   orderBy()
#   mengambil semua baris data, diurutkan berdasarkan kolom field1 secara descending
$model = new MyModel();
$data = $model->orderBy('field1', 'DESC')->findAll();

#   limit()
#   mengambil 10 baris data dari tabel
$model = new MyModel();
$data = $model->limit(10)->findAll();

#   join()
#   mengambil data dari table1 dan table2, dijoin berdasarkan kolom id dan table1_id
$model = new MyModel();
$model->select('table1.field1, table2.field2');
$model->join('table2', 'table1.id = table2.table1_id');
$data = $model->findAll();

#   groupBy()
#   menghitung jumlah kemunculan nilai dalam field1 dan mengelompokkan hasil berdasarkan nilai tersebut
$model = new MyModel();
$model->select('field1, COUNT(field1) as count_field1');
$model->groupBy('field1');
$data = $model->findAll();

#   distinct()
#   mengambil nilai unik dari kolom field1 dalam tabel
$model = new MyModel();
$model->distinct();
$model->select('field1');
$data = $model->findAll();

#   like()
#   mencari baris data yang mengandung kata kunci tertentu pada kolom field1
#   'both' artinya mencari kata kunci pada awal atau akhir atau di mana saja dalam nilai kolom
$model = new MyModel();
$model->like('field1', 'kata kunci', 'both');
$data = $model->findAll();

#   orLike()
#   mencari baris data yang mengandung kata kunci 1 atau kata kunci 2 pada kolom field1
$model = new MyModel();
$model->like('field1', 'kata kunci 1');
$model->orLike('field1', 'kata kunci 2');
$data = $model->findAll();

#   notLike()
#   mencari baris data yang tidak mengandung kata kunci tertentu pada kolom field1
$model = new MyModel();
$model->notLike('field1', 'kata kunci', 'both');
$data = $model->findAll();

#   orNotLike()
#   mencari baris data yang tidak mengandung kata kunci 1 atau kata kunci 2 pada kolom field1
$model = new MyModel();
$model->notLike('field1', 'kata kunci 1');
$model->orNotLike('field1', 'kata kunci 2');
$data = $model->findAll();

#   whereIn()
#   mencari baris data yang nilai kolom field1-nya berada dalam kumpulan nilai tertentu
$model = new MyModel();
$model->whereIn('field1', ['nilai1', 'nilai2', 'nilai3']);
$data = $model->findAll();

#   whereNotIn
#   mencari baris data yang nilai kolom field1-nya tidak berada dalam kumpulan nilai tertentu
$model = new MyModel();
$model->whereNotIn('field1', ['nilai1', 'nilai2', 'nilai3']);
$data = $model->findAll();

#   whereBetween()
#   mencari baris data yang nilai kolom field1-nya berada di antara nilai 10 dan 20
$model = new MyModel();
$model->whereBetween('field1', [10, 20]);
$data = $model->findAll();

#   whereNotBetween()
#   mencari baris data yang nilai kolom field1-nya tidak berada di antara nilai 10 dan 20
$model = new MyModel();
$model->whereNotBetween('field1', [10, 20]);
$data = $model->findAll();