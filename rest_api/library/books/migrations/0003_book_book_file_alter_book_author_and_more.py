# Generated by Django 4.2.4 on 2023-08-16 10:08

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('books', '0002_book_about_book_book_author_job_book_image_and_more'),
    ]

    operations = [
        migrations.AddField(
            model_name='book',
            name='book_file',
            field=models.FileField(blank=True, null=True, upload_to='media/book_file/'),
        ),
        migrations.AlterField(
            model_name='book',
            name='author',
            field=models.CharField(blank=True, max_length=150, null=True),
        ),
        migrations.AlterField(
            model_name='book',
            name='author_job',
            field=models.CharField(blank=True, max_length=250, null=True),
        ),
        migrations.AlterField(
            model_name='book',
            name='image',
            field=models.ImageField(blank=True, null=True, upload_to='media/book_image/'),
        ),
        migrations.AlterField(
            model_name='book',
            name='isbn',
            field=models.CharField(blank=True, max_length=13, null=True),
        ),
        migrations.AlterField(
            model_name='book',
            name='price',
            field=models.FloatField(blank=True, default=0, null=True),
        ),
        migrations.AlterField(
            model_name='book',
            name='rating',
            field=models.FloatField(blank=True, default=0, null=True),
        ),
        migrations.AlterField(
            model_name='book',
            name='subtitle',
            field=models.CharField(blank=True, max_length=250, null=True),
        ),
    ]
