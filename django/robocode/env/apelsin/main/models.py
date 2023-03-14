from django.db import models

# Create your models here.


class Category(models.Model):
    name = models.CharField(verbose_name='Turkum nomi', max_length=50)

    def __str__(self):
        return self.name


class Review(models.Model):
    name = models.CharField(verbose_name='Foydalanuvchi ismi', max_length=100)
    comment = models.TextField()

    def __str__(self):
        return self.name


class Product(models.Model):
    name = models.CharField(verbose_name='Tovar nomi', max_length=100)
    pubshiled_date = models.DateTimeField(auto_now_add=True)
    author = models.CharField(max_length=100)

    # Related
    category = models.ForeignKey(Category,
                                 on_delete=models.PROTECT,
                                 verbose_name='Tovar turkumi',
                                 related_name='products')

    # review=models.ForeignKey(Review,
    #                         on_delete=models.CASCADE,
    #                         related_name='reviews')

    # views = models.PositiveIntegerField(default=0)

    description = models.TextField(blank=True)
    published = models.BooleanField(default=False)
    top = models.BooleanField(default=False)

    def __str__(self):
        return self.name
